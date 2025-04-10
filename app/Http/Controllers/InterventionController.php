<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Classe;
use App\Models\Intervention;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreInterventionRequest;
use App\Http\Requests\UpdateInterventionRequest;

class InterventionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $interventions = Intervention::join("classes", "intervenir.classe_id", "classes.id")
            ->join("users", "intervenir.user_id", "users.id")
            ->select(
                [
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "intervenir.user_id",
                    "intervenir.classe_id",
                    "intervenir.pp",
                    "classes.id",
                    'classes.libelle as classe'
                ]
            )
            ->where("users.created_by", "=", auth()->user()->id)
            ->paginate(15);

        switch (auth()->user()->role_id) {
            case 1:
                # code...
                $interventions = Intervention::join("classes", "intervenir.classe_id", "classes.id")
                    ->join("users", "intervenir.user_id", "users.id")
                    ->select(
                        [
                            "users.nom as nomProf",
                            "users.prenoms as prenomsProf",
                            "intervenir.user_id",
                            "intervenir.classe_id",
                            "intervenir.pp",
                            "classes.id",
                            'classes.libelle as classe'
                        ]
                    )
                    ->paginate(15);

                break;
            case 2:
                # chef d'etablissement
                $interventions = Intervention::join("classes", "intervenir.classe_id", "classes.id")
                    ->join("users", "intervenir.user_id", "users.id")
                    ->select(
                        [
                            "users.nom as nomProf",
                            "users.prenoms as prenomsProf",
                            "intervenir.user_id",
                            "intervenir.classe_id",
                            "intervenir.pp",
                            "classes.id",
                            'classes.libelle as classe'
                        ]
                    )
                    ->where("users.created_by", "=", auth()->user()->id)
                    ->paginate(15);

                break;
            case 3:
                # professeur
                $interventions = Intervention::join("classes", "intervenir.classe_id", "classes.id")
                    ->join("users", "intervenir.user_id", "users.id")
                    ->select(
                        [
                            "users.nom as nomProf",
                            "users.prenoms as prenomsProf",
                            "intervenir.user_id",
                            "intervenir.classe_id",
                            "intervenir.pp",
                            "classes.id",
                            'classes.libelle as classe'
                        ]
                    )
                    ->where("intervenir.user_id", "=", auth()->user()->id)
                    ->paginate(15);

                break;

            default:
                # code...
                break;
        }
        return view("interventions.index", compact("interventions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $classes = Classe::join("niveaux", "classes.niveau_id", "niveaux.id")
            ->join("cycles", "niveaux.cycle_id", "cycles.id")
            ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
            ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
            ->select("classes.id", 'classes.libelle')
            ->where('etablissements.created_by', '=', auth()->user()->id)
            ->get();
        $profs = User::select("*")->where([
            ['role_id', '=', 3],
            ['created_by', '=', auth()->user()->id],
        ])->get();
        return view('interventions.create', compact('profs', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreInterventionRequest $request)
    {
        // dd($request->all());
        //On verifie s'il n'est pas deja pp d'une classe
        $get = Intervention::select("*")
            // ->where("classe_id", $request->classse)
            // ->where("pp", 1)
            ->where("user_id", $request->prof)->get();
        // dd($get);
        if (!is_null($get)) {
            foreach ($get as $key => $value) {
                # code...
                if ($value->user_id == $request->prof && $value->classe_id == $request->classse) {
                    return redirect()->back()->with("danger", "Intervention Professeur existe déjà!")->withInput();
                }
                if ($value->pp == $request->pp && $value->pp == 1) {
                    # il est deja PP
                    return redirect()->back()->with("danger", "Ce Professeur est déjà PP dans une classe!")->withInput();
                }
            }
        }
        $new = Intervention::create([
            "user_id" => $request->prof,
            "classe_id" => $request->classse,
            "pp" => $request->pp,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        return $new ? redirect()->route('interventions.index')->with("success", "Intervention Professeur créé(e) avec succès!") : redirect()->back()->with("danger", "Intervention Professeur non créé(e)!")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Intervention $intervention)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Intervention $intervention)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateInterventionRequest $request, Intervention $intervention)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Intervention $intervention)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Classe;
use App\Models\Niveau;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreClasseRequest;
use App\Http\Requests\UpdateClasseRequest;

class ClasseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        // dd($user);

        switch ($user->role_id) {
            case 1:
                $classes = Classe::join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("series", "series.niveau_id", "niveaux.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select(
                        "classes.id",
                        "niveaux.libelle as niveau",
                        // "series.libelle as serie",
                        "classes.libelle as classe",
                        "classes.created_at as classesCreated",
                        // "series.updated_at as seriesCreated",
                        // "series.created_at as seriesUpdated",
                        "etablissements.nom as etablissement",
                        // "etablissements.created_by",
                        "annee_academiques.libelle as annee",
                    )
                    ->distinct()
                    // ->where('etablissements.created_by', '=', $user->id)
                    ->orderBy('annee_academiques.created_at', 'desc')
                    // ->dd();
                    ->paginate(12);
                break;
            case 2:
                $classes = Classe::join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("series", "series.niveau_id", "niveaux.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select(
                        "classes.id",
                        "niveaux.libelle as niveau",
                        // "series.libelle as serie",
                        "classes.libelle as classe",
                        "classes.created_at as classesCreated",
                        // "series.updated_at as seriesCreated",
                        // "series.created_at as seriesUpdated",
                        "etablissements.nom as etablissement",
                        // "etablissements.created_by",
                        "annee_academiques.libelle as annee",
                    )
                    ->distinct()
                    ->where('etablissements.created_by', '=', $user->id)
                    ->orderBy('annee_academiques.created_at', 'desc')
                    // ->dd();
                    ->paginate(12);

                break;
            case 3:
                // $niveaux = Niveau::select('*')->where('created_by', '=', $user)->paginate(12);
                break;
        }
        // dd($classes);
        return view("classes.index", compact("classes"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $userId = auth()->user()->id;
        switch ($userId) {
            case '1':
                # Admin
                $niveaux = Niveau::join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select("niveaux.id", 'niveaux.libelle', 'etablissements.nom as etablissement')
                    // ->with("etablissement")
                    ->with("cycle")
                    ->get();
                break;

            default:
                $niveaux = Niveau::join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select("niveaux.id", 'niveaux.libelle', 'etablissements.nom as etablissement')
                    ->where('etablissements.created_by', '=', $userId)
                    ->get();

                break;
        }
        // $is = 1;
        // for ($i = 1; $i <= 300; $i++) {
        //     # code...
        //     $is =  printf('<option value="' . $i . '">' . $i . '</option>');
        // }
        // dd($is);
        // dd($niveaux);
        return view("classes.create", compact("niveaux"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClasseRequest $request)
    {
        $check = Classe::where([
            ["libelle", "=", $request->nom],
            ["effectif_c", "=", $request->effectif],
            ['niveau_id', '=', $request->niveau],
        ])->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Classe existe pour cette année!");
        }
        $new = Classe::create([
            "libelle" => $request->nom,
            "effectif_c" => $request->effectif,
            "niveau_id" =>  $request->niveau,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return $new ? redirect()->route('classes.index')->with("success", "Classe enregistrée avec succès!") : redirect()->back()->with("danger", "Classe non enregistrée!")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Classe $classe)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classe $classe)
    {
        return view("classes.edit", compact("classe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClasseRequest $request, Classe $classe)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classe $classe)
    {
        //
    }
}

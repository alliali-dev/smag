<?php

namespace App\Http\Controllers;

use App\Models\Annee;
use App\Models\Cycle;
use App\Http\Requests\StoreCycleRequest;
use App\Http\Requests\UpdateCycleRequest;
use App\Models\Etablissement;
use Illuminate\Support\Carbon;

class CycleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $owner = Cycle::all();
        // $nb = count($owner);
        // $ownerId = 0;


        // foreach ($owner as $item):
        //     for ($i = 0; $i <= $nb; $i++) {
        //         # code...
        //         $ownerId = $item->etablissement;
        //     }
        // endforeach;
        // dd($ownerId);

        $cycles = Cycle::select("id")->paginate(10);

        $user = auth()->user();
        // dd($user);

        switch ($user->role_id) {
            case 1:
                $cycles = Cycle::join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->select(
                        "cycles.id",
                        "etablissements.id as idEta",
                        "etablissements.nom as Etab",
                        "annee_academiques.libelle as annee",
                        "Cycles.libelle as cycle",
                        "etablissements.created_by",
                        "etablissements.created_at as etabCreated",
                        "etablissements.updated_at",
                        "annee_academiques.created_at as anneeCreated"
                    )
                    ->orderBy('annee_academiques.created_at', 'desc')
                    ->paginate(12);
                break;
            case 2:
                $cycles = Cycle::join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->select(
                        "cycles.id",
                        "etablissements.id as idEta",
                        "etablissements.nom as Etab",
                        "annee_academiques.libelle as annee",
                        "Cycles.libelle as cycle",
                        "etablissements.created_by",
                        "etablissements.created_at as etabCreated",
                        "etablissements.updated_at",
                        "annee_academiques.created_at as anneeCreated"
                    )
                    ->where('etablissements.created_by', '=', $user->id)
                    ->orderBy('annee_academiques.created_at', 'desc')
                    ->paginate(12);
                // dd($cycles);
                break;
            case 3:
                $ecoles = Etablissement::select('*')->where('created_by', '=', $user)->paginate(12);
                break;
        }
        return view('cycles.index', compact('cycles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = auth()->user();
        $ecoles = [];
        $annees = Annee::select('id', 'libelle')->orderBy('id', 'desc')->get();
        if ($user->role_id == 1) {
            $ecoles = Etablissement::select('id', 'nom')->orderBy('nom', 'asc')->get();
        } elseif ($user->role_id == 2) {
            $ecoles = Etablissement::select('id', 'nom')->where('created_by', '=', $user->id)->get();
        }
        return view('cycles.create', compact('annees', 'ecoles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCycleRequest $request)
    {
        //
        $check = Cycle::where([
            ['annee_academique_id', '=', $request->annee],
            ["etablissement_id", "=", $request->ecole],
            ["libelle", "=", $request->libelle]
        ])->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Cycle existe pour cette année!");
        }
        $new = Cycle::create([
            "libelle" => $request->libelle,
            "annee_academique_id" => $request->annee,
            "etablissement_id" => $request->ecole,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return $new ? redirect()->route('cycles.index')->with("success", "Cyle enregistré avec succès!") : redirect()->back()->with("danger", "Cyle non enregistré!")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Cycle $cycle)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cycle $cycle)
    {
        //
        return view("cycles.edit", compact("cycle"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCycleRequest $request, Cycle $cycle)
    {
        $check = Cycle::where([
            ['annee_academique_id', '=', $request->annee],
            ["etablissement_id", "=", $request->ecole],
            ["libelle", "=", $request->libelle]
        ])->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Cycle existe pour cette année!");
        }
        $maj = Cycle::where("id", "=", $cycle->id)->update([
            "libelle" => $request->libelle,
            "annee_academique_id" => $request->annee,
            "etablissement_id" => $request->ecole,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return $maj ? redirect()->route('cycles.index')->with("success", "Cyle modifié avec succès!") : redirect()->back()->with("danger", "Cyle non modifié!")->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cycle $cycle)
    {
        //
    }
}
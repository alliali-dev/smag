<?php

namespace App\Http\Controllers;

use App\Models\Niveau;
use App\Http\Requests\StoreNiveauRequest;
use App\Http\Requests\UpdateNiveauRequest;
use App\Models\Annee;
use App\Models\Cycle;
use Illuminate\Support\Carbon;

class NiveauController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $niveaus = Niveau::select("id")->paginate(10);

        $user = auth()->user();
        // dd($user);

        switch ($user->role_id) {
            case 1:
                $niveaus = Niveau::join("cycles", "niveaus.cycle_id", "cycles.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select(
                        "niveaus.id",
                        "cycles.id as idCycle",
                        "niveaus.libelle as niveau",
                        "niveaus.updated_at as niveauCreated",
                        "niveaus.created_at as niveauUpdated",
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
                $niveaus = Niveau::join("cycles", "niveaus.cycle_id", "cycles.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select(
                        "niveaus.id",
                        "cycles.id as idCycle",
                        "niveaus.libelle as niveau",
                        "niveaus.updated_at as niveauCreated",
                        "niveaus.created_at as niveauUpdated",
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

                break;
            case 3:
                // $niveaus = Niveau::select('*')->where('created_by', '=', $user)->paginate(12);
                break;
        }
        // dd($niveaus);
        return view('niveaus.index', compact('niveaus'));
    }

    /**
     * Afficher cycle par année
     * @return array
     */
    public function getCycleByYear($yearId)
    {
        $cycles = Cycle::join("etablissements", "cycles.etablissement_id", "etablissements.id")
            ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
            ->select("cycles.id as codeCy", 'cycles.libelle as design')
            ->where("annee_academiques.id", "=", $yearId)
            ->where('etablissements.created_by', '=', auth()->user()->id)
            // ->dd();
            ->get();
        return response()->json($cycles);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // $cycles = Cycle::join("etablissements", "cycles.etablissement_id", "etablissements.id")
        //     ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
        //     ->select("cycles.id", 'cycles.libelle')
        //     ->where('etablissements.created_by', '=', auth()->user()->id)
        //     // ->dd();
        //     ->get();
        $annees = Annee::select('id', 'libelle')->orderBy('id', 'desc')->get();
        return view('niveaus.create', compact('annees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNiveauRequest $request)
    {
        $check = Niveau::where([
            ['cycle_id', '=', $request->libelle],
            ["libelle", "=", $request->niveau]
        ])->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Ce niveau existe pour cette année!");
        }
        $new = Niveau::create([
            "cycle_id" => $request->libelle,
            "libelle" => $request->niveau,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return $new ? redirect()->route('niveaus.index')->with("success", "Niveau enregistré avec succès!") : redirect()->back()->with("danger", "Niveau non enregistré!")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Niveau $niveau)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Niveau $niveau)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNiveauRequest $request, Niveau $niveau)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Niveau $niveau)
    {
        //
    }
}

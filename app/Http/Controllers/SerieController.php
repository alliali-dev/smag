<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Niveau;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreSerieRequest;
use App\Http\Requests\UpdateSerieRequest;
use App\Models\Annee;

class SerieController extends Controller
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
                $series = Serie::join("niveaux", "series.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select(
                        "series.id",
                        "series.libelle as serie",
                        "niveaux.libelle as niveau",
                        "series.updated_at as seriesCreated",
                        "series.created_at as seriesUpdated",
                        "etablissements.created_by",
                    )
                    // ->where('etablissements.created_by', '=', $user->id)
                    ->orderBy('annee_academiques.created_at', 'desc')
                    // ->dd();
                    ->paginate(12);
                break;
            case 2:
                $series = Serie::join("niveaux", "series.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "Cycles.annee_academique_id", "annee_academiques.id")
                    ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
                    ->select(
                        "series.id",
                        "series.libelle as serie",
                        "niveaux.libelle as niveau",
                        "series.updated_at as seriesCreated",
                        "series.created_at as seriesUpdated",
                        "annee_academiques.libelle as annee",
                        "etablissements.created_by",
                    )
                    ->where('etablissements.created_by', '=', $user->id)
                    ->orderBy('annee_academiques.created_at', 'desc')
                    // ->dd();
                    ->paginate(12);

                break;
            case 3:
                // $niveaux = Niveau::select('*')->where('created_by', '=', $user)->paginate(12);
                break;
        }
        // dd($series);
        return view("series.index", compact("series"));
    }

    /**
     * Afficher cycle par année
     * @return array
     */
    public function getNiveauByYear($yearI)
    {

        $niveaux = Niveau::join("cycles", "niveaux.cycle_id", "cycles.id")
            ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
            ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
            ->select("niveaux.id as codeNi", 'niveaux.libelle as niv')
            ->where("annee_academiques.id", "=", $yearI)
            ->where('etablissements.created_by', '=', auth()->user()->id)
            ->whereIn("cycles.libelle", array("2e Cycle"))
            // ->dd();
            ->get();
        return response()->json($niveaux);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $annees = Annee::select('id', 'libelle')->orderBy('id', 'desc')->get();
        return view('series.create', compact('annees'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSerieRequest $request)
    {
        $check = Serie::where([
            ['niveau_id', '=', $request->libelle],
            ["libelle", "=", $request->serie]
        ])->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Cette série existe pour cette année!");
        }
        $new = Serie::create([
            "niveau_id" => $request->libelle,
            "libelle" => $request->serie,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        return $new ? redirect()->route('series.index')->with("success", "Serie enregistré avec succès!") : redirect()->back()->with("danger", "Serie non enregistré!")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Serie $serie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Serie $serie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSerieRequest $request, Serie $serie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Serie $serie)
    {
        //
    }
}

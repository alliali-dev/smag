<?php

namespace App\Http\Controllers;

use App\Models\Eleve;
use App\Models\Classe;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use App\Http\Requests\StoreEleveRequest;
use App\Http\Requests\UpdateEleveRequest;
use App\Models\User;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class EleveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        switch (auth()->user()->role_id) {
            case 1:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    // ->where("annee_academiques.libelle","=","2024-2025")
                    ->select(
                        'eleves.id',
                        'eleves.nom',
                        'eleves.prenoms',
                        'eleves.date_nais',
                        'eleves.lieu_nais',
                        'eleves.sexe',
                        'eleves.nationalite',
                        'eleves.matricule',
                        'eleves.redoublant',
                        'eleves.regime',
                        'eleves.affecte',
                        'eleves.photo',
                        'eleves.classe_id',
                        'eleves.created_by',
                        'eleves.created_at',
                        'eleves.updated_at',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    // ->dd();
                    ->paginate(12);
                break;
            case 2:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where('created_by', '=', auth()->user()->id)
                    // ->where("annee_academiques.libelle","=","2024-2025")
                    ->select(
                        'eleves.id',
                        'eleves.nom',
                        'eleves.prenoms',
                        'eleves.date_nais',
                        'eleves.lieu_nais',
                        'eleves.sexe',
                        'eleves.nationalite',
                        'eleves.matricule',
                        'eleves.redoublant',
                        'eleves.regime',
                        'eleves.affecte',
                        'eleves.photo',
                        'eleves.classe_id',
                        'eleves.created_by',
                        'eleves.created_at',
                        'eleves.updated_at',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    ->paginate(12);
                break;
            case 3:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where('created_by', '=', auth()->user()->id)
                    ->select(
                        'eleves.id',
                        'eleves.nom',
                        'eleves.prenoms',
                        'eleves.date_nais',
                        'eleves.lieu_nais',
                        'eleves.sexe',
                        'eleves.nationalite',
                        'eleves.matricule',
                        'eleves.redoublant',
                        'eleves.regime',
                        'eleves.affecte',
                        'eleves.photo',
                        'eleves.classe_id',
                        'eleves.created_by',
                        'eleves.created_at',
                        'eleves.updated_at',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    ->paginate(12);
                break;
        }

        // dd($eleves);
        // Eleve::select('*')->orderBy('nom', 'asc')->paginate(12);
        return view('eleves.index', compact('eleves'));
    }
    /** get students by year
     * @return response
     */
    public function indexByYear($year, $t = null)
    {
        //
        switch (auth()->user()->role_id) {
            case 1:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where("annee_academiques.libelle", "=", $year)
                    ->select(
                        'eleves.id as idElev',
                        'eleves.nom as firstname',
                        'eleves.prenoms as lastname',
                        'eleves.date_nais as birthday',
                        'eleves.lieu_nais as lieu',
                        'eleves.sexe as genre',
                        'eleves.nationalite as nation',
                        'eleves.matricule as code',
                        'eleves.redoublant as statut',
                        'eleves.regime as regim',
                        'eleves.affecte as affected',
                        'eleves.photo as avatar',
                        'eleves.classe_id as roomcode',
                        'eleves.created_by as owner',
                        'eleves.created_at as createdate',
                        'eleves.updated_at as updatedate',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    // ->dd();
                    ->get();
                break;
            case 2:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where('created_by', '=', auth()->user()->id)
                    ->where("annee_academiques.libelle", "=", $year)
                    ->select(
                        'eleves.id as idElev',
                        'eleves.nom as firstname',
                        'eleves.prenoms as lastname',
                        'eleves.date_nais as birthday',
                        'eleves.lieu_nais as lieu',
                        'eleves.sexe as genre',
                        'eleves.nationalite as nation',
                        'eleves.matricule as code',
                        'eleves.redoublant as statut',
                        'eleves.regime as regim',
                        'eleves.affecte as affected',
                        'eleves.photo as avatar',
                        'eleves.classe_id as roomcode',
                        'eleves.created_by as owner',
                        'eleves.created_at as createdate',
                        'eleves.updated_at as updatedate',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    ->get();
                break;
            case 3:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where('created_by', '=', auth()->user()->id)
                    ->select(
                        'eleves.id as idElev',
                        'eleves.nom as firstname',
                        'eleves.prenoms as lastname',
                        'eleves.date_nais as birthday',
                        'eleves.lieu_nais as lieu',
                        'eleves.sexe as genre',
                        'eleves.nationalite as nation',
                        'eleves.matricule as code',
                        'eleves.redoublant as statut',
                        'eleves.regime as regim',
                        'eleves.affecte as affected',
                        'eleves.photo as avatar',
                        'eleves.classe_id as roomcode',
                        'eleves.created_by as owner',
                        'eleves.created_at as createdate',
                        'eleves.updated_at as updatedate',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    ->get();
                break;
        }

        // dd($eleves);
        // Eleve::select('*')->orderBy('nom', 'asc')->paginate(12);
        // return view('eleves.index', compact('eleves')); 
        // $pagination =  $eleves->links();
        return response()->json(["eleves" => $eleves], 200);
    }
    /**
     * Get student by matricule
     * @param string matricule
     * @return json response 
     */
    public function getStudentByMatricule($matricule)
    {
        switch (auth()->user()->role_id) {
            case 1:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where("eleves.matricule", "=", $matricule)
                    ->select(
                        'eleves.id as idElev',
                        'eleves.nom as firstname',
                        'eleves.prenoms as lastname',
                        'eleves.date_nais as birthday',
                        'eleves.lieu_nais as lieu',
                        'eleves.sexe as genre',
                        'eleves.nationalite as nation',
                        'eleves.matricule as code',
                        'eleves.redoublant as statut',
                        'eleves.regime as regim',
                        'eleves.affecte as affected',
                        'eleves.photo as avatar',
                        'eleves.classe_id as roomcode',
                        'eleves.created_by as owner',
                        'eleves.created_at as createdate',
                        'eleves.updated_at as updatedate',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    // ->dd();
                    ->get();
                break;
            case 2:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where('created_by', '=', auth()->user()->id)
                    ->where("eleves.matricule", "=", $matricule)
                    ->select(
                        'eleves.id as idElev',
                        'eleves.nom as firstname',
                        'eleves.prenoms as lastname',
                        'eleves.date_nais as birthday',
                        'eleves.lieu_nais as lieu',
                        'eleves.sexe as genre',
                        'eleves.nationalite as nation',
                        'eleves.matricule as code',
                        'eleves.redoublant as statut',
                        'eleves.regime as regim',
                        'eleves.affecte as affected',
                        'eleves.photo as avatar',
                        'eleves.classe_id as roomcode',
                        'eleves.created_by as owner',
                        'eleves.created_at as createdate',
                        'eleves.updated_at as updatedate',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    ->get();
                break;
            case 3:
                $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
                    ->join("niveaux", "classes.niveau_id", "niveaux.id")
                    ->join("cycles", "niveaux.cycle_id", "cycles.id")
                    ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
                    ->where('created_by', '=', auth()->user()->id)
                    ->select(
                        'eleves.id as idElev',
                        'eleves.nom as firstname',
                        'eleves.prenoms as lastname',
                        'eleves.date_nais as birthday',
                        'eleves.lieu_nais as lieu',
                        'eleves.sexe as genre',
                        'eleves.nationalite as nation',
                        'eleves.matricule as code',
                        'eleves.redoublant as statut',
                        'eleves.regime as regim',
                        'eleves.affecte as affected',
                        'eleves.photo as avatar',
                        'eleves.classe_id as roomcode',
                        'eleves.created_by as owner',
                        'eleves.created_at as createdate',
                        'eleves.updated_at as updatedate',
                        'annee_academiques.libelle as annee',
                        'classes.libelle as classe',
                        'classes.effectif_c as effectif',
                    )
                    ->orderBy("eleves.nom", "asc")
                    ->orderBy("eleves.prenoms", "asc")
                    ->get();
                break;
        }
        return response()->json(["eleves" => $eleves], 200);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $classe = Classe::join("niveaux", "classes.niveau_id", "niveaux.id")
            ->join("cycles", "niveaux.cycle_id", "cycles.id")
            ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
            ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
            ->select("classes.id", 'classes.libelle')
            ->where('etablissements.created_by', '=', auth()->user()->id)
            ->get();
        return view('eleves.create', compact('classe'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEleveRequest $request)
    {
        $check = Eleve::join("classes", "eleves.classe_id", "classes.id")
            ->join("niveaux", "classes.niveau_id", "niveaux.id")
            ->join("cycles", "niveaux.cycle_id", "cycles.id")
            ->join("annee_academiques", "cycles.annee_academique_id", "annee_academiques.id")
            ->where([
                ['created_by', '=', auth()->user()->id],
                // ['eleves.matricule', '=', $request->matricule]
            ])->select(
                'eleves.id',
                'eleves.nom',
                'eleves.prenoms',
                'eleves.date_nais',
                'eleves.lieu_nais',
                'eleves.sexe',
                'eleves.nationalite',
                'eleves.matricule',
                'eleves.redoublant',
                'eleves.regime',
                'eleves.affecte',
                'eleves.photo',
                'eleves.classe_id',
                'eleves.created_by',
                'eleves.created_at',
                'eleves.updated_at',
                'annee_academiques.libelle as annee',
                'classes.libelle as classe',
                'classes.effectif_c as effectif',
            )->get();
        // dd($check);
        //  Eleve::where([
        //     ["nom", "=", $request->nom],
        //     ["prenoms", "=", $request->prenoms],
        //     ["redoublant", "=", $request->redoublant],
        //     ["matricule", "=", $request->matricule],
        //     ['classe_id', "=", $request->classe,],
        // ])->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Elève existe pour cette année!");
        }
        // dd($request->all()); 
        $photo = $request->file('photo');
        // dd($photo);
        $photoname = Str::slug('photo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
        // $extension = $photo->getClientOriginalExtension();
        $path = public_path('assets/images/eleves');
        $photo->move($path, strtolower($photoname));
        // dd($photoname);

        $user = User::create([
            'nom' => strtoupper($request->nom),
            'prenoms' => ucwords($request->prenoms),
            'date_nais' => $request->datenais,
            'lieu_nais' => ucwords($request->lieunais),
            'sexe' => $request->sexe,
            'nationalite' => ucfirst($request->nationnalite),
            'profile_photo_path' => strtolower($photoname),
            "telephone",
            "email" => $request->prenoms . '-' . $request->nom . '@' . 'gmail.com',
            "password" => Hash::make($request->nom . $request->datenais),
            "role_id",
        ]);
        $new = Eleve::create([
            'matricule' => $request->matricule,
            'redoublant' => $request->redoublant,
            'parent' => null,
            'user_id' => $user->id,
            'regime' => $request->regime,
            'affected' => $request->affecte,
            'classe_id' => $request->classe,
            'created_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        if ($new) {
            return $new ? redirect()->route('eleves.index')->with("success", "Elève enregistré(e) avec succès!") : redirect()->back()->with("danger", "Elève non enregistré(e)!")->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Eleve $eleve)
    {
        return view('eleves.show', compact('eleve'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($eleve)
    {
        $eleve = Eleve::find($eleve);
        // dd($eleve);
        $classe = Classe::all();
        return view('eleves.edit', compact('eleve', 'classe'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEleveRequest $request, $eleve)
    {
        //
        // dd($request->all());

        // $photoname = basename($_FILES['photo']['name']);
        // $extension = strtolower(pathinfo($photoname, PATHINFO_EXTENSION));
        // if ($request->file('photo')) {
        //stocker le fichier
        $photo = $request->file('photo');
        // dd($photo);
        $photoname = Str::slug('photo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
        // $extension = $photo->getClientOriginalExtension();
        $path = public_path('assets/images/eleves');
        $photo->move($path, strtolower($photoname));
        // }

        $eleve = Eleve::where('id', '=', $eleve)->get('id');
        // dd($eleve);
        $maj = Eleve::where('id', '=', $eleve[0]['id'])->update([
            'nom' => strtoupper($request->nom),
            'prenoms' => ucwords($request->prenoms),
            'date_nais' => $request->datenais,
            'lieu_nais' => ucwords($request->lieunais),
            'sexe' => $request->sexe,
            'nationalite' => ucfirst($request->nationnalite),
            'matricule' => $request->matricule,
            'redoublant' => $request->redoublant,
            'regime' => $request->regime,
            'affecte' => $request->affecte,
            'photo' => $photoname,
            'classe_id' => $request->classe,
            'created_by' => auth()->user()->id,
            'updated_at' => Carbon::now(),
        ]);
        if ($maj) {
            return redirect()->route('eleves.index');
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Eleve $eleve)
    {
        //
    }
}

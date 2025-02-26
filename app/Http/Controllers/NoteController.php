<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Http\Requests\StoreNoteRequest;
use App\Http\Requests\UpdateNoteRequest;
use App\Models\Eleve;
use App\Models\Evaluation;
use App\Models\Intervention;
use App\Models\Periode;
use App\Models\User;
use Illuminate\Database\Query\Builder;

class NoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /**
         *  $evaluations = [];
         *if (request()->all()) {
         *    // dd(request()->all());
         *    $paramPeriode = request("paramPeriode");
         * */
        $paramClasse = request("paramClasse");
        $paramDiscipline = request("paramDiscipline");
        $evaluation = Evaluation::join("periodes", "evaluations.periode_id", "periodes.id")
            ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
            ->join("classes", "evaluations.classe_id", "classes.id")
            ->join("notes", "notes.evaluation_id", "evaluations.id")
            ->join("eleves", "notes.eleve_id", "eleves.id")
            ->where("evaluations.user_id", auth()->user()->id)
            // ->where([
            //     ["evaluations.classe_id", $paramClasse],
            //     ["evaluations.discipline_id", $paramDiscipline],
            //     ["evaluations.periode_id", $paramPeriode]
            // ])
            ->orderBy("eleves.nom")
            ->orderBy("eleves.prenoms")
            // ->dd();
            ->select(
                [
                    "evaluations.id as codeEval",
                    "evaluations.type as TypeEval",
                    "evaluations.coef as CoefEval",
                    "evaluations.created_at as dateCreated",
                    "notes.id as CodeNote",
                    "notes.note as valNote",
                    "eleves.id as codeEleve",
                    "eleves.nom as firstname",
                    "eleves.prenoms as lastname",
                    "eleves.matricule as code",
                    "classes.libelle as classe",
                    "periodes.libelle as moment",
                    "disciplines.libelle as matiere",
                ]
            )
            ->get();


        # code...

        $periodes = Periode::select("*")->orderBy("created_at", "desc")->limit(3)->get();
        // dd($periodes);
        $disciplines = [];
        $prof = User::select("*")->where("id", auth()->user()->id)->get();
        if (!is_null($prof)) {
            # code...
            // dd($prof);
            foreach ($prof as $key => $val) {
                # code...
                $disciplines = $val->discipline($val->discipline_id);
                // return  $disciplines = User::discipline($val->discipline_id);
            }
        }
        $classes = Intervention::join("classes", "intervenir.classe_id", "classes.id")
            ->join("users", "intervenir.user_id", "users.id")
            ->select(
                [
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "intervenir.user_id",
                    "intervenir.pp",
                    "classes.id as idclas",
                    'classes.libelle as classe'
                ]
            )
            ->where("intervenir.user_id", "=", auth()->user()->id)
            ->get();
        // dd($classes);
        // $eleves =  $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
        //     ->join("evaluations", "classes.id", "evaluations.classe_id")
        //     ->join("periodes", "evaluations.periode_id", "periodes.id")
        //     ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
        //     ->select(
        //         "eleves.id as id",
        //         "eleves.nom as firstname",
        //         "eleves.prenoms as lastname",
        //         "eleves.matricule as code",
        //         "classes.libelle as classe",
        //         "periodes.libelle as moment",
        //         "disciplines.libelle as matiere",
        //     )
        //     ->distinct()
        //     // ->where("eleves.classe_id", "=", $id)
        //     // ->where("evaluations.user_id", auth()->user()->id)
        //     ->orderBy("classes.libelle")
        //     ->orderBy("eleves.nom")
        //     ->orderBy("eleves.prenoms")
        //     // ->dd();
        //     ->paginate(7);
        // if (request()->all()) {
        //     // dd(request()->all());
        //     $paramPeriode = request("paramPeriode");
        //     $paramClasse = request("paramClasse");
        //     $paramDiscipline = request("paramDiscipline");
        //     $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
        //         ->join("evaluations", "classes.id", "evaluations.classe_id")
        //         ->join("periodes", "evaluations.periode_id", "periodes.id")
        //         ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
        //         ->select(
        //             "eleves.id as id",
        //             "eleves.nom as firstname",
        //             "eleves.prenoms as lastname",
        //             "eleves.matricule as code",
        //             "classes.libelle as classe",
        //             "periodes.libelle as moment",
        //             "disciplines.libelle as matiere",
        //         )
        //         ->distinct()
        //         ->where([
        //             ["eleves.classe_id", $paramClasse],
        //             ["evaluations.discipline_id", $paramDiscipline],
        //             ["evaluations.periode_id", $paramPeriode]
        //         ])
        //         ->orderBy("classes.libelle")
        //         ->orderBy("eleves.nom")
        //         ->orderBy("eleves.prenoms")
        //         // ->dd();
        //         ->paginate(7);
        //     // ->get();
        //     // dd($eleves);
        // }

        // return response()->json([
        //     $disciplines,
        //     // $classes
        // ]);
        // dd($disciplines);

        return view("notes.index", compact("classes", "periodes", "disciplines",));
        // }
    }

    /** 
     * Get notes by classe, discipline and moment
     * @param int classe
     * @param int discipline
     * @param int moment
     * 
     * **/
    public function getNotes(
        int $classe = null,
        int $discipline = null,
        int $moment = null
    ) {
        // dd(request()->all());
        $classe = request("paramClasse");
        $discipline = request("paramDiscipline");
        $moment = request("paramPeriode");

        $evaluation = Evaluation::join("periodes", "evaluations.periode_id", "periodes.id")
            ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
            ->join("classes", "evaluations.classe_id", "classes.id")
            ->join("notes", "notes.evaluation_id", "evaluations.id")
            ->join("eleves", "notes.eleve_id", "eleves.id")
            ->where("evaluations.user_id", auth()->user()->id)
            ->where([
                ["evaluations.classe_id", $classe],
                ["evaluations.discipline_id", $discipline],
                ["evaluations.periode_id", $moment]
            ])
            ->orderBy("eleves.nom")
            ->orderBy("eleves.prenoms")
            // ->dd();
            ->select(
                [
                    "evaluations.id as codeEval",
                    "evaluations.type as TypeEval",
                    "evaluations.coef as CoefEval",
                    "evaluations.created_at as dateCreated",
                    "notes.id as CodeNote",
                    "notes.note as valNote",
                    "eleves.id as codeEleve",
                    "eleves.nom as firstname",
                    "eleves.prenoms as lastname",
                    "eleves.matricule as code",
                    "classes.libelle as classe",
                    "periodes.libelle as moment",
                    "disciplines.libelle as matiere",
                ]
            )
            ->get();
        // return $evaluation;
        return response()->json($evaluation);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // check last evaluation
        $evaluation = Evaluation::select("id", "type")->orderBy("id", "desc")->limit(1)->get();
        // dd($evaluation);
        // $eleve = Eleve::query()
        //     ->where("classe_id", function (Builder $query) {
        //         $query->select("*")->from("classes")->orderBy("classes.id");
        //     })->get();
        $evalId = 1;
        foreach ($evaluation as $IdEval)
            $evalId = $IdEval->id;
        $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
            ->join("evaluations", "evaluations.classe_id", "classes.id")
            ->join("users", "eleves.created_by", "users.id")
            ->select(
                "eleves.id as IdEleve",
                "eleves.nom as firstname",
                "eleves.prenoms as lastname",
                "eleves.matricule as code",
            )
            ->where("evaluations.id", $evalId)
            ->orderBy("eleves.nom")
            ->orderBy("eleves.prenoms")
            // ->dd();
            ->get();

        // dd($eleves);
        return view("notes.create", compact("evaluation", "eleves"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNoteRequest $request)
    {
        // dd(request()->all());
        $note = Note::select('id', 'evaluation_id', 'eleve_id')->where([
            ['evaluation_id', $request->Evaluation],
            ['eleve_id', $request->eleve],
        ])->get();
        $nb = count($note);
        // dd($nb);
        if ($nb > 0) {
            return back()->with('warning', 'Cet élève a déjà sa note enregistrée!')->withInput();
        } else {
            $note = Note::create([
                'evaluation_id' => $request->Evaluation,
                'eleve_id' => $request->eleve,
                'note' => $request->note,
            ]);
            return $note ? back()->with('success', 'La note de l\'élève a été enregistrée avec succès!')->withInput() :
                back()->with('danger', 'Une erreur s\'est produite, veuillez reéssayez!')->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Note $note)
    {
        // dd($note);
        $evaluation = Evaluation::select("id", "type")->where("id", "=", $note->evaluation_id)->limit(1)->get();
        // dd($evaluation);
        $note = Note::find($note->id);
        return view("notes.edit", compact("note", "evaluation"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNoteRequest $request, Note $note)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Note $note)
    {
        //
    }
}

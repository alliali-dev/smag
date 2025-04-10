<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Eleve;
use App\Models\Periode;
use App\Models\Discipline;
use App\Models\Evaluation;
use App\Models\Intervention;
use App\Http\Requests\StoreEvaluationRequest;
use App\Http\Requests\UpdateEvaluationRequest;
use App\Models\Annee;
use App\Models\Classe;
use App\Models\Niveau;
use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class EvaluationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        auth()->user()->id == 1 ? $classes = Intervention::join("classes", "intervenir.classe_id", "classes.id")
            ->join("users", "intervenir.user_id", "users.id")
            ->select(
                [
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "intervenir.user_id",
                    "intervenir.classe_id",
                    "intervenir.pp",
                    "classes.id as idclas",
                    'classes.libelle as classe'
                ]
            )
            ->get() : $classes = Intervention::join("classes", "intervenir.classe_id", "classes.id")
            ->join("users", "intervenir.user_id", "users.id")
            ->select(
                [
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "intervenir.user_id",
                    "intervenir.classe_id",
                    "intervenir.pp",
                    "classes.id as idclas",
                    'classes.libelle as classe'
                ]
            )
            ->where("intervenir.user_id", "=", auth()->user()->id)
            ->get();
        // dd($classes);
        // $idclas = 1;
        // foreach ($classes as $key => $value) {
        //     $idclas = $value->idclas;
        // }

        // dd($idclas);
        $disciplines = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discipline_id", "disciplines.id")
            ->where(
                [
                    // ["users.discipline_id", "=", "disciplines.id"],
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            // ->dd();
            ->get();

        // $idMatiere = 1;
        // foreach ($disciplines as $key => $value)
        //     foreach ($disciplines_sec as $key => $value)
        //         $idMatiere = $value->id;
        // "id", "type", "coef", "discipline_id", "coef_disc", "classe_id", "user_id", "periode_id", "created_at"
        $evaluations = Evaluation::join("classes", "evaluations.classe_id", "classes.id")
            ->join("users", "evaluations.user_id", "users.id")
            ->join("periodes", "evaluations.periode_id", "periodes.id")
            ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
            ->select(
                "evaluations.id as codeEval",
                "evaluations.type",
                "evaluations.coef",
                "evaluations.discipline_id as codeDisc",
                "evaluations.coef_disc",
                "classes.id as clasId",
                "classes.libelle as classe",
                "periodes.libelle as periode",
                "evaluations.user_id as codeProf",
                "users.nom as nomProf",
                "users.prenoms as prenomsProf",
                "evaluations.periode_id as codePeriode",
                "disciplines.libelle as matiere",
                "evaluations.created_at",
                "evaluations.updated_at",
            )
            ->where("users.id", auth()->user()->id)
            ->orderBy("evaluations.id", "asc")
            // ->dd();
            ->paginate(20);
        $disciplines = [];
        $prof = User::select("*")->where("id", auth()->user()->id)->get();
        if (!is_null($prof)) {
            # code...
            foreach ($prof as $key => $val) {
                # code...
                $disciplines = $val->discipline($val->discipline_id);
            }
        }
        if (request()->all()) {
            // dd(request()->all());
            $evaluations = Evaluation::join("classes", "evaluations.classe_id", "classes.id")
                ->join("users", "evaluations.user_id", "users.id")
                ->join("periodes", "evaluations.periode_id", "periodes.id")
                ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
                ->select(
                    "evaluations.id as codeEval",
                    "evaluations.type",
                    "evaluations.coef",
                    "evaluations.discipline_id as codeDisc",
                    "evaluations.coef_disc",
                    "classes.id as clasId",
                    "classes.libelle as classe",
                    "periodes.libelle as periode",
                    "evaluations.user_id as codeProf",
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "evaluations.periode_id as codePeriode",
                    "disciplines.libelle as matiere",
                    "evaluations.created_at",
                    "evaluations.updated_at",
                )
                ->where("users.id", auth()->user()->id)
                ->where("evaluations.classe_id", request("paramClasse"))
                ->orderBy("evaluations.id", "asc")
                // ->dd();
                ->paginate(20);
        }
        // dd($evaluations);

        return view("evaluations.index", compact("evaluations", "classes", "disciplines"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        /**
         * creer une evaluation
         *
         */

        // $disciplines = Discipline::select("disciplines.id", 'disciplines.libelle')
        //     ->join("users", "users.discipline_id", "disciplines.id")
        //     ->where(
        //         [
        //             ['users.role_id', '=', 3],
        //             ['users.id', '=', auth()->user()->id],
        //         ]
        //     )
        //     ->whereIn("disciplines.id", json_decode("users.discipline_id"))
        //     // ->dd();
        //     ->get();
        // $profs = User::select("*")->where([
        //     ['role_id', '=', 3],
        //     ['id', '=', auth()->user()->id],
        // ])->get();
        // dd($profs);

        $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
            ->join("niveaux", "classes.niveau_id", "niveaux.id")
            ->join("users", "eleves.created_by", "users.id")
            ->select(
                "eleves.id",
                // "users.nom",
                // "users.prenoms",
                "eleves.matricule",
                "niveaux.id as nId",
                "niveaux.libelle",
            )
            // ->dd();
            ->get();
        // dd($eleves);

        $profs = User::select("*")->where(
            [
                ['role_id', '=', 3],
                ['id', '=', auth()->user()->id],
            ]
        )->get();
        $annees = Annee::select("id", "libelle")->orderBy("id", "desc")->get();
        // $periodes = Periode::join("annee_academiques", "periodes.annee_academique_id", "annee_academiques.id")
        //     // ->join("etablissements", "cycles.etablissement_id", "etablissements.id")
        //     ->select("periodes.id", 'periodes.libelle')
        //     // ->where('etablissements.created_by', '=', auth()->user()->id)
        //     ->get();
        $classes = Intervention::join("classes", "intervenir.classe_id", "classes.id")
            ->join("users", "intervenir.user_id", "users.id")
            ->select(
                [
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "intervenir.user_id",
                    "intervenir.classe_id",
                    "intervenir.pp",
                    "classes.id as idclas",
                    'classes.libelle as classe'
                ]
            )
            ->where("intervenir.user_id", "=", auth()->user()->id)
            ->get();
        // dd($classes);
        return view("evaluations.create", compact("eleves", "profs", "annees", "classes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        // dd($request->all());
        // Limiter l'evaluation a 7 pour chaque matiere par periode
        $check = Evaluation::select("id", "periode_id", "discipline_id")
            ->where(
                [
                    ["periode_id", "=", $request->periode],
                    ["discipline_id", "=", $request->discipline],
                    ["classe_id", "=", $request->classe],
                    ["user_id", "=", $request->prof],
                ]
            )
            ->get();

        $nb = count($check);
        // dd($nb);
        if ($nb == 7) {
            return back()->with('warning', 'Vous avez déjà atteint sept(07) notes pour cette periode,dans cette classe!')->withInput();
        } else {
            $new = Evaluation::create(
                [
                    'periode_id' => $request->periode,
                    'classe_id' => $request->classe,
                    'discipline_id' => $request->discipline,
                    'coef_disc' => $request->coef_disc,
                    'type' => $request->typEv,
                    'coef' => $request->coef,
                    'user_id' => $request->prof,
                    // 'created_at' => Carbon::now(),
                    // 'updated_at' => Carbon::now(),
                ]
            );
            // $response = [
            //     "status" => 201,
            //     "success" => "Evaluation ajoutée avec succès",
            //     // "danger" => "Evaluation non ajoutée, veuillez reéssayez!",
            // ];
            return $new ? redirect()->route('notes.create')->with(["success" => "Evaluation ajoutée avec succès!"]) : back()->with(["danger" => "Evaluation non ajoutée, veuillez reéssayez!"])->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Evaluation $evaluation)
    {
        return view("evaluations.show", compact('evaluation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evaluation $evaluation)
    {
        $classe = Classe::select("id", "libelle")->where("id", $evaluation->id);
        return view("evaluations.edit", compact("evaluation", "classe"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEvaluationRequest $request, Evaluation $evaluation)
    {
        $maj = Evaluation::where("id", $evaluation->id)->update(
            [
                'coef_disc'  => $request->coef_disc,
                'type' => $request->typEv,
                'coef' =>  $request->coef,
                'note' => $request->note,
            ]
        );
        return $maj ? redirect()->route("evaluations.index")->with(["success" => "Evaluation modifiée!"]) :
            back()->with(["danger" => "Evaluation non modifiée, veuillez reéssayez!"])->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evaluation $evaluation)
    {
        //
    }

    /**
     * Display a listing by param.
     */
    public function filter(Request $request)
    {
        $classes = Intervention::join("classes", "intervenir.classe_id", "classes.id")
            ->join("users", "intervenir.user_id", "users.id")
            ->select(
                [
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "intervenir.user_id",
                    "intervenir.classe_id",
                    "intervenir.pp",
                    "classes.id as idclas",
                    'classes.libelle as classe'
                ]
            )
            ->where("intervenir.user_id", "=", auth()->user()->id)
            ->get();
        // dd($classes);
        $idclas = 0;
        foreach ($classes as $key => $value) {
            $idclas = $value->idclas;
        }
        $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
            ->join("niveaux", "classes.niveau_id", "niveaux.id")
            ->join("users", "eleves.created_by", "users.id")
            ->select(
                "eleves.id as codeEleve",
                // "eleves.nom as nomEleve",
                // "eleves.prenoms as prenomsEleve",
                "eleves.matricule",
                "niveaux.id as nId",
                "niveaux.libelle",
            )
            ->where("eleves.classe_id", $idclas)
            // ->orderBy("nomEleve", "asc")
            // ->orderBy("prenomsEleve", "asc")
            // ->dd();
            ->get();
        // dd($eleves);
        $disciplines = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discipline_id", "disciplines.id")
            ->where(
                [
                    // ["users.discipline_id", "=", "disciplines.id"],
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            // ->dd();
            ->get();
        // dd($disciplines);

        // dd($request->all());
        if ($request->paramClasse != "" && $request->paramEleve != "" && $request->paramDiscipline != "") {
            $evaluations = Evaluation::join("eleves", "evaluations.eleve_id", "eleves.id")
                ->join("classes", "eleves.classe_id", "classes.id")
                ->join("users", "evaluations.user_id", "users.id")
                ->join("periodes", "evaluations.periode_id", "periodes.id")
                ->select(
                    "evaluations.id as codeEval",
                    "evaluations.type",
                    "evaluations.coef",
                    "evaluations.discipline_id as codeDisc",
                    "evaluations.coef_disc",
                    "evaluations.note",
                    "evaluations.eleve_id as codeEleve",
                    // "eleves.nom as nomEleve",
                    // "eleves.prenoms as prenomsEleve",
                    "classes.libelle as classe",
                    "periodes.libelle as periode",
                    "evaluations.user_id as codeProf",
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "evaluations.periode_id as codePeriode",
                    "evaluations.created_at",
                    "evaluations.updated_at"
                )
                ->where("classes.id", $request->paramClasse)
                // ->where("eleves.id", $request->paramEleve)
                // ->orderBy("nomEleve", "asc")
                ->orderBy("prenomsEleve", "asc")
                // ->groupBy("id", "type", "coef", "discipline_id", "coef_disc", "note", "eleve_id", "user_id", "periode_id", "created_at", "updated_at")
                ->paginate(20);
            // dd($evaluations);
            return view("evaluations.index", compact("evaluations", "classes", "eleves", "disciplines"));
        } else {
            $evaluations = Evaluation::join("eleves", "evaluations.eleve_id", "eleves.id")
                ->join("classes", "eleves.classe_id", "classes.id")
                ->join("users", "evaluations.user_id", "users.id")
                ->join("periodes", "evaluations.periode_id", "periodes.id")
                ->select(
                    "evaluations.id as codeEval",
                    "evaluations.type",
                    "evaluations.coef",
                    "evaluations.discipline_id as codeDisc",
                    "evaluations.coef_disc",
                    "evaluations.note",
                    "evaluations.eleve_id as codeEleve",
                    // "eleves.nom as nomEleve",
                    // "eleves.prenoms as prenomsEleve",
                    "classes.libelle as classe",
                    "periodes.libelle as periode",
                    "evaluations.user_id as codeProf",
                    "users.nom as nomProf",
                    "users.prenoms as prenomsProf",
                    "evaluations.periode_id as codePeriode",
                    "evaluations.created_at",
                    "evaluations.updated_at"
                )
                ->orderBy("nomEleve", "asc")
                ->orderBy("prenomsEleve", "asc")
                // ->groupBy("id", "type", "coef", "discipline_id", "coef_disc", "note", "eleve_id", "user_id", "periode_id", "created_at", "updated_at")
                ->paginate(20);
        }
        // $evaluations = Evaluation::join("eleves", "evaluations.eleve_id", "eleves.id")
        //     ->join("classes", "eleves.classe_id", "classes.id")
        //     ->join("users", "evaluations.user_id", "users.id")
        //     ->join("periodes", "evaluations.periode_id", "periodes.id")
        //     ->select(
        //         "evaluations.id as codeEval",
        //         "evaluations.type",
        //         "evaluations.coef",
        //         "evaluations.discipline_id as codeDisc",
        //         "evaluations.coef_disc",
        //         "evaluations.note",
        //         "evaluations.eleve_id as codeEleve",
        //         "eleves.nom as nomEleve",
        //         "eleves.prenoms as prenomsEleve",
        //         "classes.libelle as classe",
        //         "periodes.libelle as periode",
        //         "evaluations.user_id as codeProf",
        //         "users.nom as nomProf",
        //         "users.prenoms as prenomsProf",
        //         "evaluations.periode_id as codePeriode",
        //         "evaluations.created_at",
        //         "evaluations.updated_at"
        //     )
        //     ->orderBy("nomEleve", "asc")
        //     ->orderBy("prenomsEleve", "asc")
        //     ->paginate(20);
        // dd($evaluations);
        return view("evaluations.index", compact("evaluations", "classes", "eleves", "disciplines", "disciplines_sec"));
    }
    /**
     * creer le bulletin d'un eleve
     * @return view create
     */
    public function createBulletin()
    {
        return view("bulletins.create");
    }

    /**
     * creer le bulletin d'un eleve
     * @return view index
     */
    public function getBulletin()
    {
        return view("bulletins.index");
    }

    /**
     * get periode by year
     */
    public function getPeriode($id)
    {
        // dd($id);
        $data = Periode::where('annee_academique_id', $id)->get(["id as pId", "libelle as design"]);
        // dd($data);
        return response()->json($data);
    }

    /**
     * get student by classe
     */
    public function getStudent($classe)
    {
        // dd($id);
        $data = Eleve::where('classe_id', $classe)->get(["id as elId", "nom as firstname", "prenoms as lastname", "matricule as ref"]);
        // dd($data);
        $niveau = Niveau::join("classes", "classes.niveau_id", "niveaux.id")
            ->select(
                [
                    "niveaux.id as nivId",
                    "niveaux.libelle as niveau",
                ]
            )
            ->where("classes.id", "=", $classe)
            ->get();
        $series = Serie::join("niveaux", "series.niveau_id", "niveaux.id")
            ->join("classes", "classes.niveau_id", "niveaux.id")
            ->select(
                [
                    "series.id as serId",
                    "series.libelle as serie",
                ]
            )
            ->where("classes.id", "=", $classe)
            ->get();
        return response()->json(["data" => $data, "niveau" => $niveau, "series" => $series]);
    }

    /**
     * get student by classe for index
     */
    public function getStudentByClasse($classe = null)
    {
        $classe != null ?
            $data = Eleve::where('classe_id', $classe)
            ->orderBy("firstname", "asc")
            ->orderBy("lastname", "asc")
            ->get(["id as elId", "nom as firstname", "prenoms as lastname", "matricule as ref"]) : null;
        // dd($data);
        // $niveau = Niveau::join("classes", "classes.niveau_id", "niveaux.id")
        //     ->select(
        //         [
        //             "niveaux.id as nivId",
        //             "niveaux.libelle as niveau",
        //         ]
        //     )
        //     ->where("classes.id", "=", $classe)
        //     ->get();
        // $series = Serie::join("niveaux", "series.niveau_id", "niveaux.id")
        //     ->join("classes", "classes.niveau_id", "niveaux.id")
        //     ->select(
        //         [
        //             "series.id as serId",
        //             "series.libelle as serie",
        //         ]
        //     )
        //     ->where("classes.id", "=", $classe)
        //     ->get();
        return response()->json(
            $data
        );
    }
    /**
     * get evaluation  by student for index
     */
    public function getEvaluationByStudent($eleve = null, $t = null)
    {
        $eleve != null ? $data = Evaluation::join("eleves", "evaluations.eleve_id", "eleves.id")
            ->join("classes", "eleves.classe_id", "classes.id")
            ->join("users", "evaluations.user_id", "users.id")
            ->join("periodes", "evaluations.periode_id", "periodes.id")
            ->select(
                "evaluations.id as codeEval",
                "evaluations.type",
                "evaluations.coef",
                "evaluations.discipline_id as codeDisc",
                "evaluations.coef_disc",
                "evaluations.note",
                "evaluations.eleve_id as codeEleve",
                // "eleves.nom as nomEleve",
                // "eleves.prenoms as prenomsEleve",
                "classes.libelle as classe",
                "periodes.libelle as periode",
                "evaluations.user_id as codeProf",
                "users.nom as nomProf",
                "users.prenoms as prenomsProf",
                "evaluations.periode_id as codePeriode",
                "evaluations.created_at as dateCrea",
                "evaluations.updated_at",

            )
            ->where("evaluations.eleve_id", $eleve)
            ->orderBy("nomEleve", "asc")
            ->orderBy("prenomsEleve", "asc")
            ->get() : null;
        $totalCoef = $data->sum('coef');
        return response()->json(
            $data
        );
    }
}

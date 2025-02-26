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
        $idclas = 1;
        foreach ($classes as $key => $value) {
            $idclas = $value->idclas;
        }
        $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
            ->join("niveaus", "classes.niveau_id", "niveaus.id")
            ->join("users", "eleves.created_by", "users.id")
            ->select(
                "eleves.id as codeEleve",
                "eleves.nom as nomEleve",
                "eleves.prenoms as prenomsEleve",
                "eleves.matricule",
                "niveaus.id as nId",
                "niveaus.libelle",
            )
            ->where("eleves.classe_id", $idclas)
            ->orderBy("nomEleve", "asc")
            ->orderBy("prenomsEleve", "asc")
            // ->dd();
            ->get();
        // dd($eleves);
        $disciplines = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discip_princ", "disciplines.id")
            ->where(
                [
                    // ["users.discip_princ", "=", "disciplines.id"],
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            // ->dd();
            ->get();
        $disciplines_sec = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discip_second", "disciplines.id")
            ->where(
                [
                    // ["users.discip_princ", "=", "disciplines.id"],
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
                "eleves.nom as nomEleve",
                "eleves.prenoms as prenomsEleve",
                "classes.libelle as classe",
                "periodes.libelle as periode",
                "evaluations.user_id as codeProf",
                "users.nom as nomProf",
                "users.prenoms as prenomsProf",
                "evaluations.periode_id as codePeriode",
                "evaluations.created_at",
                "evaluations.updated_at",

            )
            ->orderBy("nomEleve", "asc")
            ->orderBy("prenomsEleve", "asc")
            ->paginate(20);
        // dd($evaluations);
        $totalCoef = $evaluations->sum('coef');
        // $coefFoisNote = 1;
        // foreach ($evaluations as $item) {
        //     $coefFoisNote = $item->coef * $item->note;
        // }
        return view("evaluations.index", compact("evaluations", "classes", "eleves", "disciplines", "disciplines_sec", "totalCoef"));
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
        $disciplines = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discip_princ", "disciplines.id")
            ->where(
                [
                    // ["users.discip_princ", "=", "disciplines.id"],
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            // ->dd();
            ->get();
        // dd($disciplines);
        $discipsecond = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discip_second", "disciplines.id")

            ->where(
                [
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            ->get();
        $eleves = Eleve::join("classes", "eleves.classe_id", "classes.id")
            ->join("niveaus", "classes.niveau_id", "niveaus.id")
            ->join("users", "eleves.created_by", "users.id")
            ->select(
                "eleves.id",
                "eleves.nom",
                "eleves.prenoms",
                "eleves.matricule",
                "niveaus.id as nId",
                "niveaus.libelle",
            )
            // ->dd();
            ->get();
        // dd($eleves);
        // $coefDisc = 1;
        // foreach ($eleves as $value) {
        //     # code...
        //     switch ($value->libelle) {
        //         case '6ème':
        //            $coefDisc =1;
        //             break;
        //         case '5ème':
        //             # code...
        //             break;
        //         case '4ème':
        //             # code...
        //             break;
        //         case '3ème':
        //             # code...
        //             break;
        //         case '2nde':
        //             # code...
        //             break;
        //         case '1ère':
        //             break;
        //         case 'Tle':
        //             break;
        //         default:
        //             # code...
        //             break;
        //     }
        // }
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
        return view("evaluations.create", compact("disciplines", "discipsecond", "eleves", "profs", "annees", "classes"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEvaluationRequest $request)
    {
        $new = Evaluation::create(
            [
                'periode_id' => $request->periodeFromYear,
                'eleve_id' => $request->eleve,
                'discipline_id' => $request->discipline,
                'coef_disc' => $request->coef_disc,
                'type' => $request->typEv,
                'coef' => $request->coef,
                'note' => $request->note,
                'user_id' => $request->prof,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]
        );
        $response = [
            "status" => 201,
            "success" => "Evaluation ajoutée avec succès",
            // "danger" => "Evaluation non ajoutée, veuillez reéssayez!",
        ];
        return $new ? response()->json($response) : back()->with(["danger" => "Evaluation non ajoutée, veuillez reéssayez!"])->withInput();
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
        return view("evaluations.edit", compact("evaluation"));
        // return view("evaluations.edit", compact('evaluation'));
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
            ->join("niveaus", "classes.niveau_id", "niveaus.id")
            ->join("users", "eleves.created_by", "users.id")
            ->select(
                "eleves.id as codeEleve",
                "eleves.nom as nomEleve",
                "eleves.prenoms as prenomsEleve",
                "eleves.matricule",
                "niveaus.id as nId",
                "niveaus.libelle",
            )
            ->where("eleves.classe_id", $idclas)
            ->orderBy("nomEleve", "asc")
            ->orderBy("prenomsEleve", "asc")
            // ->dd();
            ->get();
        // dd($eleves);
        $disciplines = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discip_princ", "disciplines.id")
            ->where(
                [
                    // ["users.discip_princ", "=", "disciplines.id"],
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            // ->dd();
            ->get();
        // dd($disciplines);
        $disciplines_sec = Discipline::select("disciplines.id", 'disciplines.libelle')
            ->join("users", "users.discip_second", "disciplines.id")
            ->where(
                [
                    // ["users.discip_princ", "=", "disciplines.id"],
                    ['users.role_id', '=', 3],
                    ['users.id', '=', auth()->user()->id],
                ]
            )
            // ->dd();
            ->get();
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
                    "eleves.nom as nomEleve",
                    "eleves.prenoms as prenomsEleve",
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
                ->where("eleves.id", $request->paramEleve)
                ->orderBy("nomEleve", "asc")
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
                    "eleves.nom as nomEleve",
                    "eleves.prenoms as prenomsEleve",
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
        $niveau = Niveau::join("classes", "classes.niveau_id", "niveaus.id")
            ->select(
                [
                    "niveaus.id as nivId",
                    "niveaus.libelle as niveau",
                ]
            )
            ->where("classes.id", "=", $classe)
            ->get();
        $series = Serie::join("niveaus", "series.niveau_id", "niveaus.id")
            ->join("classes", "classes.niveau_id", "niveaus.id")
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
        // $niveau = Niveau::join("classes", "classes.niveau_id", "niveaus.id")
        //     ->select(
        //         [
        //             "niveaus.id as nivId",
        //             "niveaus.libelle as niveau",
        //         ]
        //     )
        //     ->where("classes.id", "=", $classe)
        //     ->get();
        // $series = Serie::join("niveaus", "series.niveau_id", "niveaus.id")
        //     ->join("classes", "classes.niveau_id", "niveaus.id")
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
                "eleves.nom as nomEleve",
                "eleves.prenoms as prenomsEleve",
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
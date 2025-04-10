<?php

use App\Http\Controllers\AnneeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CycleController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EtablissementController;
use App\Http\Controllers\EvaluationController;
use App\Http\Controllers\InterventionController;
use App\Http\Controllers\NiveauController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\PeriodeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SerieController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::middleware('auth')->group(function () {
    Route::get('/enseignants/index', [UserController::class, 'getProf'])->name('prof.index');
    Route::get('/enseignants/create', [UserController::class, 'createProf'])->name('prof.create');
    Route::post('/enseignants', [UserController::class, 'storeProf'])->name('prof.store');
    Route::patch('/enseignants/{user}', [UserController::class, 'update'])->name('prof.update');
    Route::get('/enseignants/{user}', [UserController::class, 'editProf'])->name('prof.edit');

    // annee academique
    Route::resource('annees', AnneeController::class);
    Route::get('/periodes/create/{id}', [AnneeController::class, 'getYear'])->name('an.get');
    // periode
    Route::resource('periodes', PeriodeController::class);
    // cycles
    Route::resource('cycles', CycleController::class);
    // eleve
    Route::resource('eleves', EleveController::class);
    Route::get("/eleves/create/{matricule}", [EleveController::class, "getStudentByMatricule"]);
    // get students by year
    Route::get("/eleves/index/{year}", [EleveController::class, "indexByYear"]);
    // discipline
    Route::resource('disciplines', DisciplineController::class);
    // get cycle by year
    Route::get("/niveaux/create/{yearId}", [NiveauController::class, "getCycleByYear"]);
    // niveau
    Route::resource('niveaux', NiveauController::class);
    // get niveau for serie
    Route::get("/series/create/{yearI}", [SerieController::class, "getNiveauByYear"]);
    // series
    Route::resource('series', SerieController::class);
    // classe
    Route::resource('classes', ClasseController::class);
    // ecole
    Route::resource('etablissements', EtablissementController::class);
    // intervention prof
    Route::resource('interventions', InterventionController::class);
    // evaluation
    Route::resource("evaluations", EvaluationController::class);
    // get periode by year
    Route::get('/evaluations/create/{id}', [EvaluationController::class, 'getPeriode'])->name('periode.get');
    // get student by classe
    // $date = date("H");
    Route::get('/evaluations/create/{classe}/{time}', [EvaluationController::class, 'getStudent'])->name('student.get');
    Route::post("/evaluations/filter", [EvaluationController::class, 'filter'])->name('index.filter');
    // get student by classe for index
    Route::get("/evaluations/index/{clas}", [EvaluationController::class, 'getStudentByClasse'])->name('index.getStudentByClasse');
    // get evaluation by student for index
    Route::get("/evaluations/index/{eleve}/{t}", [EvaluationController::class, 'getEvaluationByStudent'])->name('index.getEvaluationByStudent');
    // notes
    Route::resource("/notes", NoteController::class);
    Route::get("/notes/index/{pp}/{pc}/{pd}/", [NoteController::class, "getNotes"]);
});


Route::middleware('auth')->group(function () {
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

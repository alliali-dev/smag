<?php

namespace App\Http\Controllers;

use App\Http\Requests\AnneeUpdateRequest;
use App\Http\Requests\AnneStoreRequest;
use App\Models\Annee;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AnneeController extends Controller
{
    //
    /**
     * @return create view 
     */
    public function create()
    {
        return view('annees.create');
    }

    /**
     * Store new 
     * @param $request
     */
    public function store(AnneStoreRequest $request)
    {
        $d = substr($request->datedebut, 0, 4);
        $f = substr($request->datefin, 0, 4);
        if (($f - $d) != 1) {
            return back()->with('danger', 'L\'ecart doit etre 1 an.')->withInput();
        }

        // dd($request->all());
        $new = Annee::create([
            'libelle' => $request->libelle,
            'debut_annee' => $request->datedebut,
            'fin_annee' => $request->datefin,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
        if ($new) {
            return redirect()->route('annees.index');
        }
        // else {
        //     return redirect()->back()->withInput();
        // }
    }


    /**
     * Display all years
     * @return view index
     */
    public function index()
    {
        $annees = Annee::select("*")->orderBy('id', 'desc')->paginate(12);
        return view('annees.index', compact('annees'));
    }

    /**
     * @return edit view 
     */
    public function edit(Annee $annee)
    {
        // dd($annee);
        return view('annees.edit', compact('annee'));
    }
    /**
     * Update only year
     */
    public function update(AnneeUpdateRequest $request, Annee $annee)
    {
        // dd($request->all());
        $d = substr($request->datedebut, 0, 4);
        $f = substr($request->datedefin, 0, 4);
        if (($f - $d) != 1) {
            return back()->with('danger', 'L\'ecart doit etre 1 an.')->withInput();
        }
        $new = Annee::where('id', '=', $annee->id)->update([
            'libelle' => $request->libelle,
            'fin_annee' => $request->datedefin,
            'debut_annee' => $request->datedebut,
            'fin_annee' => $request->datedefin,
            'updated_at' => Carbon::now(),
        ]);
        if ($new) {
            return redirect()->route('annees.index');
        }
        // else {
        //     return redirect()->back()->withInput();
        // }
    }

    public function show(Annee $annee)
    {

        // return view('annees.show', compact('annee'));
    }

    public function getYear($id)
    {
        // dd($id);
        $data = Annee::where('id', $id)->get();
        // dd($data);
        return response()->json($data);
    }
}

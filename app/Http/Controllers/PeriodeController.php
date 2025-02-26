<?php

namespace App\Http\Controllers;

use App\Models\Periode;
use App\Http\Requests\StorePeriodeRequest;
use App\Http\Requests\UpdatePeriodeRequest;
use App\Models\Annee;
use Illuminate\Support\Carbon;

class PeriodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $periodes = [];
        $periodes = Periode::select('*')->orderBy('id', 'desc')->paginate(10);
        return view('periodes.index', compact('periodes'));
    }

    /**
     * Show the form for creating a maj resource.
     */
    public function create()
    {
        //
        $annees = Annee::select('id', 'libelle')->orderBy('id', 'desc')->get();
        return view('periodes.create', compact('annees'));
    }

    /**
     * Store a majly created resource in storage.
     */
    public function store(StorePeriodeRequest $request)
    {
        // dd($request->all());
        $check = Periode::where('annee_academique_id', '=', $request->annee)->get('id');
        if (count($check) > 0) {
            // return response()->json(['danger' => "Periode existe pour cette année!"]);
            return back()->with('danger', "Periode existe pour cette année!");
        }

        if ($request->type == "Trimestre") {
            # code... 
            $data = [
                [
                    'type' => $request->type,
                    'libelle' => '1er Trimestre',
                    'annee_academique_id' => $request->annee,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'type' => $request->type,
                    'libelle' => '2e Trimestre',
                    'annee_academique_id' => $request->annee,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'type' => $request->type,
                    'libelle' => '3e Trimestre',
                    'annee_academique_id' => $request->annee,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ];
            $new = Periode::insert($data);
            return $new ? redirect()->route('periodes.index')->with("success", "Periode enregistrée avec succès!") : redirect()->back()->withInput();
        } elseif ($request->type == "Semestre") {
            # code...
            $data = [
                [
                    'type' => $request->type,
                    'libelle' => '1er Semestre',
                    'annee_academique_id' => $request->annee,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
                [
                    'type' => $request->type,
                    'libelle' => '2e Semestre',
                    'annee_academique_id' => $request->annee,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ],
            ];
            $maj = Periode::insert($data);
            return  $maj ? redirect()->route('periodes.index')->with("success", "Periode enregistrée avec succès!") : redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Periode $periode)
    {
        //
        return view('periodes.show', compact('periode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Periode $periode)
    {
        //
        $annees = Annee::select('id', 'libelle')->orderBy('id', 'desc')->get();
        return view('periodes.edit', compact('periode', 'annees'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePeriodeRequest $request, Periode $periode)
    {
        //
        // if ($request->type == "Trimestre") {
        //     # code... 
        //     $data = [
        //         [
        //             'type' => $request->type,
        //             'libelle' => '1er Trimestre',
        //             'updated_at' => Carbon::now()
        //         ],
        //         [
        //             'type' => $request->type,
        //             'libelle' => '2e Trimestre',
        //             'updated_at' => Carbon::now()
        //         ],
        //         [
        //             'type' => $request->type,
        //             'libelle' => '3e Trimestre',
        //             'updated_at' => Carbon::now()
        //         ],
        //     ];
        //     $maj = Periode::where('id', '=', $periode->id)->update($data);
        //     return $maj ? redirect()->route('periodes.index')->with("success", "Periode modifiée avec succès!") : redirect()->back()->withInput();
        // } elseif ($request->type == "Semestre") {
        //     # code...
        //     $data = [
        //         'type' => $request->type,
        //         'libelle' => '1er Semestre',
        //         'libelle' => '2e Semestre',
        //         'updated_at' => Carbon::now()
        //     ];
        //     $maj =
        //         Periode::where('id', '=', $periode->id)->update($data);
        //     return  $maj ? redirect()->route('periodes.index')->with("success", "Periode modifiée avec succès!") : redirect()->back()->withInput();
        // }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Periode $periode)
    {
        //
    }
}
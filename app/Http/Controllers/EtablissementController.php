<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Etablissement;
use App\Http\Requests\StoreEtablissementRequest;
use App\Http\Requests\UpdateEtablissementRequest;
use Illuminate\Support\Carbon;

class EtablissementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = auth()->user();
        // dd($user);
        $ecoles = [];
        switch ($user->role_id) {
            case 1:
                $ecoles = Etablissement::select("id", "nom", "statut", "code", "telephone", "email", "adresse_postale", "localisation", "logo", "photo", "ville", "created_by", "created_at", "updated_at")->paginate(12);
                break;
            case 2:
                $ecoles = Etablissement::select("id", "nom", "statut", "code", "telephone", "email", "adresse_postale", "localisation", "logo", "photo", "ville", "created_by", "created_at", "updated_at")
                    ->where('created_by', '=', $user->id)->paginate(12);
                // dd($ecoles);
                break;
                // case 3:
                //     $ecoles = Etablissement::select('*')->where('created_by', '=', $user)->paginate(12);
                //     break;
        }

        // dd($ecoles);
        return view('etablissements.index', compact('ecoles'));
    }

    /**
     * Show the form for creating a eco$ecoles resource.
     */
    public function create()
    {
        return view('etablissements.create');
    }

    /**
     * Store a eco$ecolesly created resource in storage.
     */
    public function store(StoreEtablissementRequest $request)
    {
        //
        $logoname = "";
        if ($request->file('logo')) {
            //stocker le fichier
            $logo = $request->file('logo');
            // dd($photo);
            $logoname = Str::slug('logo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();
            // $extension = $photo->getClientOriginalExtension();
            $path = public_path('assets/images/logos');
            $logo->move($path, strtolower($logoname));
        }

        $photoname = "";
        if ($request->file('photo')) {
            //stocker le fichier
            $photo = $request->file('photo');
            // dd($photo);
            $photoname = Str::slug('photo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
            // $extension = $photo->getClientOriginalExtension();
            $path = public_path('assets/images/etablissements');
            $photo->move($path, strtolower($photoname));
        }
        $ecoles = Etablissement::create([
            'nom' => ucwords($request->nom),
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse_postale' => ucwords($request->adresse),
            'statut' => $request->statut,
            'code' =>  $request->code,
            'ville' => ucwords($request->ville),
            'localisation' => ucwords($request->localisation),
            'logo' => strtolower($logoname),
            'photo' => strtolower($photoname),
            'created_by' => auth()->user()->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'region' => null,
            'departement' => null,
            'commune' => null,
            'quartier' => null,
        ]);
        if ($ecoles) {
            return $this->index();
        } else {
            return back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Etablissement $etablissement)
    {
        //
        return view('etablissements.show', compact('etablissement'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Etablissement $etablissement)
    {
        //
        return view('etablissements.edit', compact('etablissement'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEtablissementRequest $request, Etablissement $etablissement)
    {
        //
        // $logoname = "";
        // if ($request->file('logo')) {
        //     //stocker le fichier
        //     $logo = $request->file('logo');
        //     // dd($photo);
        //     $logoname = Str::slug('logo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $logo->getClientOriginalExtension();
        //     // $extension = $photo->getClientOriginalExtension();
        //     $path = public_path('assets/images/logos');
        //     $logo->move($path, strtolower($logoname));
        // }

        // $photoname = "";
        // if ($request->file('photo')) {
        //     //stocker le fichier
        //     $photo = $request->file('photo');
        //     // dd($photo);
        //     $photoname = Str::slug('photo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
        //     // $extension = $photo->getClientOriginalExtension();
        //     $path = public_path('assets/images/etablissements');
        //     $photo->move($path, strtolower($photoname));
        // }
        $ecoles = Etablissement::where('id', '=', $etablissement->id)->update([
            'nom' => ucwords($request->nom),
            'email' => $request->email,
            'telephone' => $request->telephone,
            'adresse_postale' => ucwords($request->adresse),
            'statut' => $request->statut,
            'code' =>  $request->code,
            'ville' => ucwords($request->ville),
            'localisation' => ucwords($request->localisation),
            // 'logo' => strtolower($logoname),
            // 'photo' => strtolower($photoname),
            'updated_at' => Carbon::now(),
            'region' => null,
            'departement' => null,
            'commune' => null,
            'quartier' => null,
        ]);
        if ($ecoles) {
            return $this->index();
        } else {
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Etablissement $etablissement)
    {
        //
    }
}

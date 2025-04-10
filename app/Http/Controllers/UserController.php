<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeProf(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:60'],
            'prenoms' => ['required', 'string', 'max:160'],
            'telephone' => ["required", "regex:/^\+[0-9]{1,3}?\s[0-9]{10}$/", 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'passwords' => ['required', 'string', 'min:12', 'max:160',],
            'discip_princ' => ['required', 'string',],
            'sexe' => ['required', 'string', 'max:160'],
            "discip_second" => ['nullable', 'string',],
            'avatar' => ["nullable", 'extensions:jpg,png,jpeg'],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $photoname = "photo.png";
        $photo = $request->file('avatar');
        if ($request->file('avatar')) {
            $photo = $request->file('avatar');
            // dd($photo);
            $photoname = Str::slug('avatar') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
            // $extension = $photo->getClientOriginalExtension();
            $path = public_path('assets/images/avatar');
            $photo->move($path, strtolower($photoname));
        }
        // dd(auth()->user()->id);
        $discipline = json_encode($request->discipline);
        $user = User::create(
            [
                "nom" => strtoupper($request->nom),
                "prenoms" => ucwords($request->prenoms),
                "telephone" => $request->telephone,
                "email" => $request->email,
                // "login" => $request->login,
                "password" => Hash::make($request->password),
                "profile_photo_path" => strtolower($photoname),
                "role_id" => 3,
                "sexe" => $request->sexe,
                "discipline_id" => $discipline,
                'created_by' => auth()->user()->id,
                "created_at" => Carbon::now(),
                "updated_at" => Carbon::now(),
            ]
        );

        return $user ? redirect()->route('prof.index')->with("success", "Professeur enregistré(e) avec succès!") : redirect()->back()->with("danger", "Professeur non enregistré(e)!")->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'nom' => ['required', 'string', 'max:60'],
            'prenoms' => ['required', 'string', 'max:160'],
            'telephone' => ["required", "regex:/^\+[0-9]{1,3}?\s[0-9]{10}$/",],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255',],
            'sexe' => ['required', 'string', 'max:160'],
            'discipline' => ['required',],
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }
        // dd($request->all());
        $discipline = json_encode($request->discipline);
        // dd($discipline);
        $user = User::where("id", "=", $user->id)
            ->update(
                [
                    "nom" => strtoupper($request->nom),
                    "prenoms" => ucwords($request->prenoms),
                    "telephone" => $request->telephone,
                    "email" => $request->email,
                    "sexe" => $request->sexe,
                    // "discip_princ" => $request->discip_princ,
                    "discipline_id" => $discipline,
                    // "discip_second" => 0,
                    "updated_at" => Carbon::now(),
                ]
            );
        return $user ? redirect()->route('prof.index')->with("success", "Professeur modifié(e) avec succès!") : redirect()->back()->with("danger", "Professeur non modifié(e)!")->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }

    public function getProf()
    {
        switch (auth()->user()->id) {
            case 1:
                # Admin
                $profs = User::select("*")->where([
                    ['role_id', '=', 3],
                ])->paginate(20);
                break;
            case 2:
                # Dirigeant
                $profs = User::select("*")->where([
                    ['role_id', '=', 3],
                    ['created_by', '=', auth()->user()->id],
                ])->paginate(20);
                break;
            default:
                return redirect()->route("prof.index")->with("danger", "Vous n\avez pas le droit!");
                break;
        }

        // dd($profs);
        return view('enseignants.index', compact('profs'));
    }

    /**
     * Créer un nouvel enseignant
     * @return view
     */
    public function createProf()
    {
        $role = Role::where('id', '=', 3)->get(['id', 'libelle']);
        $diciplines = Discipline::select('id', 'libelle')->orderBy('libelle', 'asc')->get();
        return view('enseignants.create', compact('role', 'diciplines'));
    }


    /**
     * Afficher page de modification d'un enseignant
     * @return view
     */
    public function editProf(User $user)
    {
        // dd($user);

        $diciplines = Discipline::select('id', 'libelle')->orderBy('libelle', 'asc')->get();
        return view('enseignants.edit', compact('user', 'diciplines'));
    }
}

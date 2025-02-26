<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Requests\api\UserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;




class UserController extends Controller
{
    //
    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [

            "email" => ["required", "email", "max:20", "unique:users"],
            "login" => ["required", "string", "max:20"],
            "passwords" => ["required", "string", "min:12", "max:20"],
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'success'   => false,
                    'status_code' => 402,
                    'token_type' => 'Bearer',
                    'message' => 'Les informations d\'authentification saisies sont incorrectes!',
                ]
            );
        }
        $user = User::where("login", "=", $request->login)->orWhere("email", "=", $request->email)->first();
        // $tokenResult = $user->createToken('authToken')->plainTextToken;
        if (is_null($user)) {
            return response()->json(["status" => "failed", "status_code" => 404, "errors" => "Failed! user not found",]);
        } else {
            $token = $user->createToken("token");
            $token = $token->plainTextToken;
            if (!Auth::check()) {

                if (Auth::attempt(["email" => $request->email, "password" => $request->password]) || Auth::attempt(["login" => $request->login, "password" => $request->password])) {

                    return response()->json([
                        'status'   => "Connection success!",
                        'status_code' => 200,
                        'token'     => $token,
                        'token_type' => 'Bearer',
                        'user'      => $user
                    ]);
                } else {
                    return response()->json(["status" => "failed", "status_code" => 401, "errors" => "Connection failed!  Please verify your inputs."]);
                }
            } else {
                return response()->json([
                    'success' => false,
                    'errors' => 'You are already connected!',
                    'status_code' => 201,
                ]);
            }
        }
    }

    public function store(Request $request)
    {
        // $user = User::create($request->all());
        $validator = Validator::make($request->all(), [
            "nom" => ["required", "string", "max:20"],
            "prenoms" => ["required", "string", "max:20"],
            "telephone" => ["required", "string", "max:20"],
            "email" => ["required", "email", "max:20", "unique:users"],
            "login" => ["required", "string", "max:20"],
            "passwords" => ["required", "string", "min:12", "max:20"],
            "sexe" => ["required", "string", "max:20"],
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'success'   => false,
                    'status_code' => 402,
                    'token_type' => 'Bearer',
                    'message' => 'Les informations saisies sont incorrectes!',
                ]
            );
        }
        $user = User::create([
            "nom" => $request->nom,
            "prenoms" => $request->prenoms,
            "telephone" => $request->telephone,
            "email" => $request->email,
            "login" => $request->login,
            "passwords" => Hash::make($request->passwords),
            "profile_photo_path" => $request->profile_photo_path,
            "role_id" => $request->role_id,
            "sexe" => $request->sexe,
            "discip_princ" => $request->discip_princ,
            "discip_second" => $request->discip_second,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);
        if ($user) {
            return response()->json(
                [
                    'success'   => true,
                    'status_code' => 200,
                    'token_type' => 'Bearer',
                    'message' => "Utilisateur créé avec succès!",
                    'user'      => $user,
                ]
            );
        } else {
            return response()->json(
                [
                    'success'   => false,
                    'status_code' => 401,
                    'token_type' => 'Bearer',
                    'message' => 'Utilisateur non créé!',
                ]
            );
        }
    }

    public function listUser()
    {
        $user = User::all();
        if (!is_null($user)) {
            return response()->json(
                [
                    'status_code' => 200,
                    'token_type' => 'Bearer',
                    'user' => $user
                ]
            );
        } else {
            return response()->json([
                'status_code' => 401,
                'token_type' => 'Bearer',
                'message' => 'Aucun utilisateur trouvé!',
            ]);
        }
    }

    public function update(Request $request)
    {
        $user = User::where("id", "=", $request->idUser)->update([
            "nom" => $request->nom,
            "prenoms" => $request->prenoms,
            "telephone" => $request->telephone,
            "email" => $request->email,
            "login" => $request->login,
            "passwords" => Hash::make($request->passwords),
            "profile_photo_path" => $request->profile_photo_path,
            "role_id" => $request->role_id,
            "discip_princ" => $request->discip_princ,
            "discip_second" => $request->discip_second,
            "updated_at" => Carbon::now(),
        ]);

        if ($user) {
            return response()->json([
                'success'   => true,
                'status_code' => 200,
                'token_type' => 'Bearer',
                'message' => "Utilisateur modifié avec succès!",
            ]);
        } else {
            return response()->json([
                'success'   => false,
                'status_code' => 401,
                'token_type' => 'Bearer',
                'message' => 'Utilisateur non modifié!',
            ]);
        }
    }

    /**
     * Afficher les enseignants
     * @return view
     */
    public function getProf()
    {
        $profs = User::select("*")->where([
            ['role_id', '=', 3],
            ['created_by', '=', auth()->user()->id],
        ])->paginate(12);
        // dd($profs);
        return view('enseignants.index', compact('profs'));
    }

    /**
     * Créer un nouvel enseignant
     * @return view
     */
    public function createProf()
    {
        $role = Role::where('id', '=', 4)->get(['id', 'libelle']);
        return view('enseignants.create', compact('role'));
    }


    /**
     * Afficher page de modification d'un enseignant
     * @return view
     */
    public function editProf(User $user)
    {
        // dd($user);
        return view('enseignants.edit', compact('user'));
    }
}

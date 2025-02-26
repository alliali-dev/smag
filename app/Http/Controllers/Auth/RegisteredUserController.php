<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nom' => ['required', 'string', 'max:255'],
            'prenoms' => ['required', 'string', 'max:255'],
            'telephone' => ["required", "regex:/^\+[0-9]{1,3}?\s[0-9]{10}$/"],
            'profile_photo' => ["nullable", "extensions:jpg,png,jpeg"],
            "sexe" => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults(), 'min:8'],

        ]);
        $photoname = "";
        if ($request->file('profile_photo')) {
            //stocker le fichier
            $photo = $request->file('profile_photo');
            // dd($photo);
            $photoname = Str::slug('profile_photo') . '_' . str_replace(" ", "_", $request->nom) . '_' . time() . '_' . Str::random(10) . '.' . $photo->getClientOriginalExtension();
            // $extension = $photo->getClientOriginalExtension();
            $path = public_path('assets/images/avatar');
            $photo->move($path, strtolower($photoname));
        }
        // dd($photoname);
        $user = User::create([
            "nom" => strtoupper($request->nom),
            "prenoms" => ucwords($request->prenoms),
            "telephone" => $request->telephone,
            "email" => $request->email,
            "login" => $request->login,
            "passwords" => Hash::make($request->password),
            "profile_photo_path" => $photoname,
            "role_id" => 2, //dirigeant
            "sexe" => $request->sexe,
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now(),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}

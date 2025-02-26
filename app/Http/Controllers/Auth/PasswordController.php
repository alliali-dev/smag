<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePasswordRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(UpdatePasswordRequest $request)
    {

        $user = User::find($request->us);
        $maj = User::where("id", $user->id)->update(["passwords" => Hash::make($request->password)]);
        if ($maj) {
            Auth::logout();
            return  redirect("/")->with("success", "Mot de passe modifié!");
        } else {
            return  back()->with("danger", "Echec de modification!");
        }
    }
}

<?php

use App\Models\User;

/**
 * Get user's role
 * @return string
 */
function userRole()
{
    $roles = User::join("roles", 'users.role_id', "roles.id")
        ->where("users.id", '=', auth()->user()->id)
        ->select("roles.libelle")->get();
    foreach ($roles as $key => $item) {
        # code...
        return $item->libelle;
    }
}

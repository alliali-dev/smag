<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "nom",
        "prenoms",
        "sexe",
        "telephone",
        "email",
        "login",
        "passwords",
        "profile_photo_path",
        "role_id",
        // "discip_princ",
        // "discip_second",
        "discipline_id",
        "created_by",
        "created_at",
        "updated_at",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function role()
    {
        return $this->belongsTo(Role::class);
    }
    /**
     * recuperer la discipline principale du prof
     * @param array int
     * @return array
     */
    public static function discipline($param = null)
    {

        return  !is_null($param) ? (in_array(auth()->user()->role_id, [1, 3, 4]) ?
            Discipline::select("id as codeMat", "libelle as matiere")->whereIn("id", json_decode($param))->get() :
            false) :
            false;

        // return $this->belongsTo(Discipline::class, 'discipline_id', 'id')->dd();

    }


    public function eleve()
    {
        return $this->belongsTo(Eleve::class);
    }
}

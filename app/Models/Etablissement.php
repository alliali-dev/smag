<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etablissement extends Model
{
    use HasFactory;
    protected $table = "etablissements";
    protected $fillable = [
        'id',
        'nom',
        'statut',
        'code',
        'telephone',
        'email',
        'adresse_postale',
        'localisation',
        'logo',
        'photo',
        'region',
        'departement',
        'ville',
        'commune',
        'quartier',
        'created_by',
        'created_at',
        'updated_at',
    ];

    /**
     * get cycle
     */
    public function cycle()
    {
        return $this->hasMany(Cycle::class, 'etablissement_id', 'id');
    }
}
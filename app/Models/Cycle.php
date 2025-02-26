<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cycle extends Model
{
    use HasFactory;
    protected $table = "cycles";
    protected $fillable = ['libelle', 'annee_academique_id', 'etablissement_id', 'created_at', 'updated_at',];

    /**
     * get etablissement
     */
    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'etablissement_id', 'id');
    }

    /**
     * get year
     */

    public function annee()
    {
        return $this->belongsTo(Annee::class, 'annee_academique_id', 'id');
    }
}
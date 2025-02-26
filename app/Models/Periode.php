<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode extends Model
{
    use HasFactory;
    protected $table = "periodes";
    protected $fillable = ['type', 'libelle', 'annee_academique_id', 'created_at', 'updated_at'];

    /**
     * afficher l'année 
     * @return array
     */
    public function annee()
    {
        return $this->belongsTo(Annee::class, 'annee_academique_id', 'id');
    }
}

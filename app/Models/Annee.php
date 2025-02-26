<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Annee extends Model
{
    use HasFactory;
    protected $table = "annee_academiques";
    protected $fillable = [
        'libelle',
        'debut_annee',
        'fin_annee',
        'created_at',
        'updated_at',
    ];

    /**
     * get periodes
     */
    public function periode()
    {
        return $this->hasMany(Periode::class, 'annee_academique_id', 'id');
    }

    /**
     * get cycles
     */
    public function cycle()
    {
        return $this->hasMany(Cycle::class, 'annee_academique_id', 'id');
    }
}
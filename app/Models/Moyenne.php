<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moyenne extends Model
{
    use HasFactory;
    protected $table = "moyennes";
    protected $fillable = [
        'moy',
        'moy_coef',
        'rang',
        'appreciation',
        'periode_id',
        'discipline_id',
        'eleve_id',
        'created_at',
        'updated_at',
    ];
}

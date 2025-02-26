<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;
    protected $table = "disciplines";
    protected $fillable = ['libelle', 'type_disc', 'created_at', 'updated_at',];
}
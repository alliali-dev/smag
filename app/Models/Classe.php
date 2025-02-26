<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;
    protected $table = "classes";
    protected $fillable = ['libelle', 'effectif_c', 'niveau_id', 'created_at', 'updated_at',];

    /**
     * Get eleve for Evaluation
     * @return eleve
     */
    public function eleveForClasse()
    {
        return $this->belongsTo(Eleve::class, "eleve_id", "id")->withDefault();
    }

    // get classe for evaluation edit
    public function Evaluation()
    {
        return $this->hasMany(Evaluation::class, "evaluation_id", "id");
    }
}

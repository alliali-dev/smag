<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eleve extends Model
{
    use HasFactory;
    protected $table = "eleves";
    protected $fillable = [
        'matricule',
        'redoublant',
        'regime',
        'affected',
        'classe_id',
        'created_by',
        'parent',
        'user_id',
        'created_at',
        'updated_at',
        // matricule 	redoublant 	regime 	affected 	classe_id 	created_by 	parent 	user_id 	
    ];
    /**
     * Get classe for Eleve
     * @return classe
     */
    public function classeForEleve()
    {
        return $this->hasMany(Classe::class, "id",  "classe_id");
    }

    /**
     * Get note
     *@return note
     */
    public function note()
    {
        return $this->hasMany(Note::class, "eleve_id", "id")
            ->join("evaluations", "notes.evaluation_id", "evaluations.id")
            // ->join("periodes", "evaluations.periode_id", "periodes.id")
            // ->join("disciplines", "evaluations.discipline_id", "disciplines.id")
            // ->join("classes", "evaluations.classe_id", "classes.id")
            ->select(
                "notes.id as CodeNote",
                "notes.note as valNote",
                "evaluations.id as codeEval",
                "evaluations.type as typeEval",
                "evaluations.coef as CoefEval",
                "evaluations.created_at as dateCreated",
                // "classes.libelle as classe",
                // "periodes.libelle as moment",
                // "disciplines.libelle as matiere",
            );
    }

    public function getStudentInfo()
    {
        return $this->hasMany(User::class, 'id', 'user_id');
    }
}

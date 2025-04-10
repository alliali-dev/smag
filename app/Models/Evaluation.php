<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Periode;

class Evaluation extends Model
{
    use HasFactory;
    protected $table = "evaluations";
    protected $fillable = [
        'type',
        'coef',
        'discipline_id',
        'coef_disc',
        'classe_id',
        'user_id',
        'periode_id',
        // 'created_at',
        // 'updated_at',
    ];

    /**
     * Get perode for Evaluation
     * @return periode
     */
    public  function periodeForEvaluation()
    {
        return $this->belongsTo(Periode::class, "periode_id", "id");
    }


    /**
     * Get eleve for Evaluation
     * @return eleve
     */
    public function eleveForEvaluation()
    {
        return $this->belongsTo(Eleve::class, "eleve_id", "id");
    }

    /**
     * Get professeur for Evaluation
     * @return professeur
     */
    public function profForEvaluation()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }

    /**
     * Get discipline for Evaluation
     * @return discipline
     */
    public function disciplineEvaluation()
    {
        return $this->belongsTo(Discipline::class, "discipline_id", "id");
    }

    // get classe for evaluation edit
    public function EvaluationClasse()
    {
        return $this->belongsTo(Classe::class, "classe_id", "id", "evaluations");
    }


    /**
     * Get note
     *@return Note
     **/
    public function notes()
    {
        return $this->hasMany(Note::class, "evaluation_id", "id");
    }
}

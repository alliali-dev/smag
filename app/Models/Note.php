<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Note extends Model
{
    use HasFactory;
    protected $table = "notes";
    protected $fillable = [
        'note',
        'evaluation_id',
        'eleve_id',
        // 'created_at',
        // 'updated_at',
    ];

    /**
     * Get Eleve
     * @return eleve
     */
    public function eleve()
    {
        return $this->belongsTo(Eleve::class, "eleve_id", "id");
    }

    /**
     * get evaluation
     * @return evaluation
     */
    public function evaluation()
    {
        return $this->belongsTo(Evaluation::class, "evaluation_id", "id");
    }
}

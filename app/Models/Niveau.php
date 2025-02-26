<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Niveau extends Model
{
    use HasFactory;
    protected $table = "niveaus";
    protected $fillable = ['libelle', 'cycle_id', 'created_at', 'updated_at'];

    /**
     * Get cycle (parent of niveau)
     * @return array
     */
    public function cycle()
    {
        return $this->belongsTo(Cycle::class, "cycle_id", "id");
    }

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class);
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Intervention extends Model
{
    use HasFactory;
    protected $table = "intervenir";
    protected $fillable = ["user_id", "classe_id", "pp", "created_at", "updated_at"];
}
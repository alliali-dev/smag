<?php

namespace Database\Seeders;

use App\Models\Annee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class AnneeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return Annee::insert([
            [
                "libelle" => "2024-2025",
                "debut_annee" => "2024-09-16 07:00:00",
                "fin_annee" => "2025-07-13 18:00:00",
                "created_at" => Date::now(),
                "updated_at" => Date::now(),
            ],
            [
                "libelle" => "2025-2026",
                "debut_annee" => "2025-09-17 07:00:00",
                "fin_annee" => "2026-07-11 18:00:00",
                "created_at" => Date::now(),
                "updated_at" => Date::now(),
            ],
            [
                "libelle" => "2026-2027",
                "debut_annee" => "2026-09-14 07:00:00",
                "fin_annee" => "2027-07-10 18:00:00",
                "created_at" => Date::now(),
                "updated_at" => Date::now(),
            ],
        ]);
    }
}

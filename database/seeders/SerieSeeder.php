<?php

namespace Database\Seeders;

use App\Models\Serie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SerieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        /**
         * 
         * "A", 19, "2024-09-15 10:56:57", "2024-09-15 10:56:57",
         * "C", 19, "2024-09-15 11:12:08", "2024-09-15 11:12:08",
         * "A1", 20, "2024-09-15 11:20:39", "2024-09-15 11:20:39";
         */

        return Serie::insert([
            [
                "libelle" => "A",
                "niveau_id" => 1,
                "created_at" => "2024-09-15 10:56:57",
                "updated_at" => "2024-09-15 10:56:57"
            ],
            [
                "libelle" => "A1",
                "niveau_id" => 2,
                "created_at" => "2024-09-15 11:12:08",
                "updated_at" => "2024-09-15 11:12:08"
            ],
            [
                "libelle" => "A2",
                "niveau_id" => 2,
                "created_at" => "2024-09-15 11:12:08",
                "updated_at" => "2024-09-15 11:12:08"
            ],
            [
                "libelle" => "C",
                "niveau_id" => 2,
                "created_at" => "2024-09-15 11:12:08",
                "updated_at" => "2024-09-15 11:12:08"
            ],
            [
                "libelle" => "D",
                "niveau_id" => 2,
                "created_at" => "2024-09-15 11:12:08",
                "updated_at" => "2024-09-15 11:12:08"
            ],
            [
                "libelle" => "F",
                "niveau_id" => 2,
                "created_at" => "2024-09-15 11:12:08",
                "updated_at" => "2024-09-15 11:12:08"
            ],
            [
                "libelle" => "G",
                "niveau_id" => 2,
                "created_at" => "2024-09-15 11:12:08",
                "updated_at" => "2024-09-15 11:12:08"
            ],

        ]);
    }
}

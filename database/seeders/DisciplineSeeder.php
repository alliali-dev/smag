<?php

namespace Database\Seeders;

use App\Models\Discipline;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Date;

class DisciplineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return Discipline::insert(
            [
                [
                    "libelle" => "Anglais",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Histoire-Geographie",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Français",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Espagnol",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Allemand",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Science de la vie et de la terre",
                    "type_disc" => "Science",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Philisophie",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Physique-Chimie",
                    "type_disc" => "Science",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Mathématiques",
                    "type_disc" => "Science",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Chinois",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Grec",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Education Physique et Sportive",
                    "type_disc" => "Autre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Musique",
                    "type_disc" => "Autre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Arabe",
                    "type_disc" => "Lettre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Conduite",
                    "type_disc" => "Autre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Arts Plastiques",
                    "type_disc" => "Autre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "EDHC",
                    "type_disc" => "Autre",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
            ]
        );
    }
}

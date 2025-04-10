<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::insert(
            [
                [
                    "libelle" => "Admin",
                    "description" => "",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Dirigeant",
                    "description" => "Chef d'etablissement scolaire",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Enseignant",
                    "description" => "",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],

                [
                    "libelle" => "Educateur",
                    "description" => "",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Censeur",
                    "description" => "",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Econome",
                    "description" => "",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Parent",
                    "description" => "Parent d\'élève",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],
                [
                    "libelle" => "Eleve",
                    "description" => "Elève",
                    "created_at" => Date::now(),
                    "updated_at" => Date::now(),
                ],

            ]
        );
    }
}

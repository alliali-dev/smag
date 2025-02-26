<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Role::create([
            [
                "libelle" => "Admin",
                "description" => "",
            ],
            [
                "libelle" => "Dirigeant",
                "description" => "Chef d'etablissement scolaire",
            ],
            [
                "libelle" => "Enseignant",
                "description" => "",
            ],

            [
                "libelle" => "Educateur",
                "description" => "",
            ],
            [
                "libelle" => "Censeur",
                "description" => "",
            ],
            [
                "libelle" => "Econome",
                "description" => "",
            ],

        ]);
    }
}

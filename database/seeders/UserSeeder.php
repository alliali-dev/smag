<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        return User::insert([
            [
                'nom' => 'ALLIALI',
                'prenoms' => 'Nogues',
                'date_nais' => '1998-01-01',
                'lieu_nais' => 'Didiévi',
                'sexe' => 'M',
                'nationalite' => 'Côte d\'Ivoire',
                'telephone' => '0506439352',
                'profile_photo_path' => '',
                'email' => 'alliali.dev@gmail.com',
                'email_verified_at' => null,
                'password' => Hash::make('alliali.dev@gmail.com'),
                'created_by' => null,
                'role_id' => '1',
                "created_at" => Date::now(),
                "updated_at" => Date::now(),
            ],
        ]);
    }
}

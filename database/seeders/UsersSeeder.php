<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user= User::create(
            [
                'name' => 'Yael',
                'email' => 'correo@correo.com',
                'password' => Hash::make('12345678'),
                'url' => 'mipagina_yael.com'
            ]
        );
        // $user->perfil()->create();

        $user= User::create(
            [
                'name' => 'Erick',
                'email' => 'correo2@correo.com',
                'password' => Hash::make('12345678'),
                'url' => 'mipagina_Erick.com'
            ]
        );
        // $user->perfil()->create();

        /* DB::table('users')->insert(
            [
                'name' => 'Yael',
                'email' => 'correo@correo.com',
                'password' => Hash::make('12345678'),
                'url' => 'mipagina_yael.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        );

        DB::table('users')->insert(
            [
                'name' => 'Erick',
                'email' => 'correo2@correo.com',
                'password' => Hash::make('12345678'),
                'url' => 'mipagina_Erick.com',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ]
        ); */
    }
}

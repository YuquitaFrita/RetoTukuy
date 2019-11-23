<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Usuarios con información falsa(No podremos acceder a la cuenta)
        factory(App\User::class, 29)->create();
        

        //Creación de nuestro usuario
        App\User::create([
            'name' => 'Arian Angoma',
            'email' => 'arian.angoma@tecsup.edu.pe',
            'password' => bcrypt('123')
        ]);
    }
}

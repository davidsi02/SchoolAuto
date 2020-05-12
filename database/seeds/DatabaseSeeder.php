<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
              'name' => 'Acesso Cantina',
              'email' => 'ac@etpsico.pt',
              'password' => bcrypt('password'),
              'tipoUtilizador' => 0,
              'numProcesso' => 999993,
               'pin' => bcrypt(6859)
             ]);
                }
}

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
              'name' => 'Acesso Portaria',
              'email' => 'ap@etpsico.pt',
              'password' => bcrypt('password'),
              'tipoUtilizador' => 0,
              'numProcesso' => 999992,
               'pin' => bcrypt(6859)
             ]);
                }
}

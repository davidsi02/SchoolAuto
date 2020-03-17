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
              'name' => 'David Castanheira Simões',
              'email' => '17gpsi7@etpsico.pt',
              'password' => bcrypt('Simoes.100'),
              'tipoUtilizador' => 1,
              'numProcesso' => 20202,
               'pin' => bcrypt(6859)
             ]);
                }
}

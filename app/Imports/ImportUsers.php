<?php

namespace App\Imports;

use App\User;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Str;

class ImportUsers implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {

       $randompsw = Str::random(8);

        return new User([
          /*  'name'     => $row[2],
            'email'    => $row[6].'@etpsico.pt',
            'numProcesso' => $row[0],
            'password' => bcrypt($randompsw),

            */

            'name' => 'Acesso AAA',
            'email' => 'aAAA@etpsico.pt',
            'password' => bcrypt('password'),
            'numProcesso' => 956765,

        ]);
    }
}

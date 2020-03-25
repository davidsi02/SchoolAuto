<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
  protected $fillable = ['idOperacao','valorOperacao','dataOperacao','nomeOperacao','idProduto','idUtilizador'];
}

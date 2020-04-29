<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
  protected $fillable = ['id','nomeProduto','precoProduto','idCategoria'];
  public $timestamps = false;

}

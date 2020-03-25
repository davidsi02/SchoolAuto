<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $fillable = ['id','nomeProduto','precoProduto','idCategoria'];
  public $timestamps = false;

}

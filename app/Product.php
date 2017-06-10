<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = "product";
  protected $fillable = ['name','code','amount','height'];

  public function box_concrette(){
    return $this->hasMany('App\box_concrette');
  }
}

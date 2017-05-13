<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  protected $table = "product";
  protected $fillable = ['name' ,'width' ,'code'];

  public function stocks(){
  return $this->belongsTo('App\Stock');
}
}

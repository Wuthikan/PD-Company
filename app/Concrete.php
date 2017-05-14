<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concrete extends Model
{
  protected $table = "concrette";
  protected $fillable = ['idinvoice' ,'amount','price'];

  public function scopeWhereconcrete($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }
}

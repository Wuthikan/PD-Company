<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra_concrette extends Model
{
  protected $table = "extra_concrette";
  protected $fillable = ['idinvoice' ,'name','width','amount','height','price'];

  public function scopeWhereextraconcrete($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }

}

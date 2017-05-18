<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class box_concrette extends Model
{
  protected $table = "box_concrette";
  protected $fillable = ['idinvoice' ,'idproduct','amount','height','price'];

  public function scopeWhereboxconcrete($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }
  public function products(){
    return $this->belongsTo('App\Product', 'idproduct');
  }
}

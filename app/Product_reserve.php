<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_reserve extends Model
{
  protected $table = "reserve_product";
  protected $fillable = ['idproduct' ,'idboxconcrete'];

  Public function scopeWhereproductreserve($query,$idproduct,$idboxconcrete)
  {
    $query->where('idproduct','=', $idproduct)->where('idboxconcrete','=', $idboxconcrete);
  }
  public function box_concrettes(){
    return $this->belongsTo('App\box_concrette', 'idboxconcrete');
  }
}

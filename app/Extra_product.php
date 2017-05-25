<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra_product extends Model
{
  protected $table = "extra_product";
  protected $fillable = ['idproduct' ,'idboxconcrete'];
  Public function scopeWhereextrareserve($query,$idproduct,$idboxconcrete)
  {
    $query->where('idproduct','=', $idproduct)->where('idboxconcrete','=', $idboxconcrete);
  }
  public function box_concrettes(){
    return $this->belongsTo('App\box_concrette', 'idboxconcrete');
  }
}

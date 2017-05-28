<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class box_concrette extends Model
{
  protected $table = "box_concrette";
  protected $fillable = ['idinvoice' ,'idproduct','amount','height','price','state','shipping'];

  public function scopeWhereboxconcrete($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }
  public function scopeWhereboxconcretestate($query,$id,$state)
  {
    $query->where('idinvoice','=', $id)->where('state','=', $state);
  }
  public function products(){
    return $this->belongsTo('App\Product', 'idproduct');
  }
  public function scopeWhereconcrete($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }
  public function scopeWhereconcretecheck($query,$id)
  {
    $query->where('idinvoice','=', $id)->where('shipping','=', '1');
  }
  public function invoices(){
    return $this->belongsTo('App\Invoice', 'idinvoice');
  }

}

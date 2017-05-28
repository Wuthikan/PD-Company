<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Concrete extends Model
{
  protected $table = "concrette";
  protected $fillable = ['idinvoice' ,'amount','price','shipping'];

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

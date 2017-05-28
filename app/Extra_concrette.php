<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Extra_concrette extends Model
{
  protected $table = "extra_concrette";
  protected $fillable = ['idinvoice' ,'name','width','amount','height','price','shipping'];

  public function scopeWhereextraconcrete($query,$id)
  {
    $query->where('idinvoice','=', $id);
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

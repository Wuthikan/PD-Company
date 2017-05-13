<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
  protected $table = "stock";
  protected $fillable = ['idproduct' ,'amount'];

  public function scopeWhereproduct($query,$id)
  {
    $query->where('idproduct','=', $id);
  }
  public function products(){
    return $this->belongsTo('App\Product', 'idproduct');
  }
}

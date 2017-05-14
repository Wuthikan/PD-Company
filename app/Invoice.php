<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
  protected $table = "invoice";
  protected $fillable = ['code' ,'idcustomer' ,'idemployee','price','discount','type'];

  public function users(){
  return $this->belongsTo('App\User');
}
}

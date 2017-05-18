<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = "customer";
  protected $fillable = ['code' ,'name','address','city','province','zipcode','tel','fax'];

  public function invoice(){
    return $this->hasMany('App\Invoice');
  }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
  protected $table = "customer";
  protected $fillable = ['code' ,'name','address','city','province','zipcode','tel','fax','reference','company'];

  public function invoice(){
    return $this->hasMany('App\Invoice');
  }
  public function scopeWherecustomer($query,$term)
  {
    $query->where('name','=', $term);
  }

}

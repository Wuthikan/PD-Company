<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
  protected $table = "invoice";
  protected $fillable = ['code' ,'idcustomer' ,'idemployee','price','discount','type','payment','shipping'];
  protected $dates = ['created_at'];

  public function users(){
  return $this->belongsTo('App\User');
}

    public function customers(){
      return $this->belongsTo('App\Customer', 'idcustomer');
    }

    public function scopeWhereemployee($query,$id)
    {
      $query->where('idemployee','=', $id);
    }
    public function scopeWherestate($query,$ids)
    {
      $query->where('payment','=', $ids);
    }
}

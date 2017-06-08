<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Invoice extends Model
{
  protected $table = "invoice";
  protected $fillable = ['code' ,'idcustomer' ,'idemployee','price','discount','type','payment','shipping',
  'signature','note','percent'
];
  protected $dates = ['created_at','updated_at'];

  public function users(){
  return $this->belongsTo('App\User', 'idemployee');
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
    public function scopeWhereconcrete($query)
    {
      $query->where('type','=', '1')->where('payment','=', '1');
    }
    public function scopeWhereboxconcrete($query)
    {
      $query->where('type','=', '2')->where('payment','=', '1');
    }
}

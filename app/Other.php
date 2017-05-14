<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Other extends Model
{
  protected $table = "other";
  protected $fillable = ['idinvoice' ,'detail' ,'price'];

  public function scopeWhereother($query,$id)
  {
    $query->where('idinvoice','=', $id);
  }
}

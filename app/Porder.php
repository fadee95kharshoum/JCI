<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Porder extends Model
{
    protected $guarded = [''];
    public function user()
   {
       return $this->belongsTo(User::class);
   }
}

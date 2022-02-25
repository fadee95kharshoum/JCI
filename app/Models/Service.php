<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $guarded = ['id'];
    public function partners(){

        return $this->belongsToMany('App\Models\Partner', 'partner_service', 'service_id', 'partner_id', 'id', 'id');
    }


}

<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Metting extends Model
{
    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function members(){

        return $this->belongsToMany('App\Member', 'member_metting', 'metting_id', 'member_id', 'id', 'id');
    }
}

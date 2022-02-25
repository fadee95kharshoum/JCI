<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Financial extends Model
{
    protected $guarded = ['id'];

    public function project()
    {
        return $this->belongsTo('App\Project');
    }
}

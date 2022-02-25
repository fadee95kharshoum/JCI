<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $guarded = ['id'];

    public function projects(){

        return $this->belongsToMany('App\Project', 'kpi_project', 'kpi_id', 'project_id','id', 'id');
    }
}

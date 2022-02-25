<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partners';

    protected $guarded = ['id'];

    public function partners(){

        return $this->belongsToMany('App\Models\Project', 'partner_project', 'partner_id', 'project_id', 'id', 'id');
    }
    public function services(){

        return $this->belongsToMany('App\Models\Service', 'partner_service', 'partner_id', 'service_id', 'id', 'id');
    }
}

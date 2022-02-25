<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $table = 'projects';
    protected $guarded = ['id'];
    public function members(){

        return $this->belongsToMany('App\Models\Member', 'member_project', 'project_id', 'member_id', 'id', 'id');
    }
    public function partners(){

        return $this->belongsToMany('App\Models\Partner', 'partner_project', 'project_id', 'partner_id', 'id', 'id');
    }
    public function mettings(){

        return $this->hasMany('App\Metting', 'project_id', 'id');
    }

    public function financial(){

        return $this->hasOne('App\Financial', 'project_id');
    }

    public function kpis(){

        return $this->belongsToMany('App\Kpi', 'kpi_project', 'project_id', 'kpi_id','id', 'id');
    }
}

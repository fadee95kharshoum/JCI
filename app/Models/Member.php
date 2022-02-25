<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    protected $table = 'members';
    protected $guarded = ['id'];
    public function projects(){

        return $this->belongsToMany('App\Models\Project', 'member_project', 'member_id', 'project_id', 'id', 'id');
    }
    public function mettings(){

        return $this->belongsToMany('App\Metting', 'member_metting', 'member_id', 'metting_id', 'member_id', 'id', 'id');
    }
}

<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
   
    protected $guarded = [''];
    public function packages()
    {
        return $this->hasMany(Point::class);
    }
     // this is a recommended way to declare event handlers
     public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->countries()->delete();
             // do the rest of the cleanup...
        });
    }
}

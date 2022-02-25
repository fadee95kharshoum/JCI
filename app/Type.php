<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $guarded = [''];
    /**
     * Get all of the countries for the Type
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function countries()
    {
        return $this->hasMany(Country::class);
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

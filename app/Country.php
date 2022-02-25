<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [''];
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    /**
     * Get all of the cards for the Country
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cards()
    {
        return $this->hasMany(Card::class);
    }
     // this is a recommended way to declare event handlers
     public static function boot() {
        parent::boot();

        static::deleting(function($user) { // before delete() method call this
             $user->cards()->delete();
             // do the rest of the cleanup...
        });
    }
}

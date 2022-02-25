<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    protected $guarded = [''];
    /**
     * Get the game that owns the Point
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}

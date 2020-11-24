<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShiftProportion extends Model
{

    protected $fillable = ['day', 'night'];

    public function shifts()
    {
        return $this->hasMany(Shift::class, 'proportion_id', 'id');
    }

    public function getNightAttribute(int $time): float
    {
        return $this->getDayAttribute($time);
    }

    public function getDayAttribute(int $time): float
    {
        return (float)$time / 60;
    }
}

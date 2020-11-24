<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Shift extends Model
{

    use SoftDeletes;

    const DAY_HOURS_START   = '06:00';
    const DAY_HOURS_END     = '22:00';
    const NIGHT_HOURS_START = '22:00';
    const NIGHT_HOURS_END   = '06:00';

    const HOURS_STEP_IN_MINUTES = '30';
    const HOURS_STEP_IN_SECONDS = self::HOURS_STEP_IN_MINUTES * 60;

    protected $fillable = [
        'title',
        'start',
        'end',
        'proportion_id'
    ];

    protected $with = [
        'proportion',
    ];

    protected $casts = [
        'title' => 'string',
    ];

    public function proportion()
    {
        return $this->hasOne(ShiftProportion::class, 'id', 'proportion_id');
    }

    public function getEndAttribute($time)
    {
        return $this->getStartAttribute($time);
    }

    public function getStartAttribute($time)
    {
        return Carbon::createFromFormat('H:i:s', $time)->format('H:i');
    }
}

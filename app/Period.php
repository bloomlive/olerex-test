<?php

namespace App;

class Period extends \Spatie\Period\Period
{

    public function lengthInMinutes(): int
    {
        $hoursInMinutes = ($this->getIncludedStart()->diff($this->getIncludedEnd())->h) * 60;
        $minutes        = ($this->getIncludedStart()->diff($this->getIncludedEnd())->i);

        return $hoursInMinutes + $minutes;
    }

}


<?php

namespace App\Rules;

use DateTimeImmutable;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class TwelveHoursMaxBetween implements Rule
{

    private string $otherField;
    private array $form;

    public function __construct(string $secondField, array $form)
    {
        $this->otherField = $secondField;
        $this->form = $form;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $other = Arr::get($this->form, $this->otherField);

        $periodStart = DateTimeImmutable::createFromFormat('G:i', $value);
        $periodEnd   = DateTimeImmutable::createFromFormat('G:i', $other);

        if ($periodStart->diff($periodEnd)->invert) {
            $periodEnd = $periodEnd->add(\DateInterval::createFromDateString('+1 day'));
        }

        $hours = ($periodStart->diff($periodEnd)->h) + (($periodStart->diff($periodEnd)->i) / 60);

        return ($hours >= 12);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Vahetus ei tohi kesta kauem kui 12 tundi.';
    }
}

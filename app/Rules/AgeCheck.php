<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class AgeCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $dob = new \DateTime($value);
        $today = new \DateTime();
        $age = $today->diff($dob)->y;

        return $age >= 21;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'You must be at least 21 years old.';
    }
}

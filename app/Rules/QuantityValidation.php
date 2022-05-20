<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class QuantityValidation implements Rule
{

    public $quantity;
    public $sum_quantities;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($quantity,$sum_quantities)
    {
        $this->quantity = $quantity;
        $this->sum_quantities = $sum_quantities;

    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value )
    {
        if( $this->sum_quantities){
        $sum=0;
        foreach ($this->sum_quantities as $item) {
            $sum += ($item['quantity_variant'] ?? 0);
        }
        return $sum <= $value;
    }
    else
     return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return __('validation.qty_not_same ');
    }
}

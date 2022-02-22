<?php

namespace App\Rules\CreateOrder;

use App\Models\Dish;
use Illuminate\Contracts\Validation\Rule;

class ValidateDishesArray implements Rule
{
    protected $currentDish;

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {

        $dishValidate = new ValidateDishesRule();
        $firstDishValidateBool = $dishValidate->passes('dish_id', $value[array_key_first($value)]['dish_id']);
        //получаем айди ресторана у первого блюда, чтобы далее сравнить его со всеми
        if ($firstDishValidateBool)
            $this->currentDish = Dish::find($value[array_key_first($value)]['dish_id']);
            $firstDishRestaurantId = $this->currentDish->restaurant_id;

        if (count($value) > 1) {
            foreach ($value as $dish) {
                $dishValidate->passes('dish_id', $dish['dish_id']);
                $this->currentDish = Dish::find($dish['dish_id']);

                if ($firstDishRestaurantId != $this->currentDish->restaurant_id)
                    return false;
            }
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        //
        return "Ordered dishes from different restaurants" ;
    }
}

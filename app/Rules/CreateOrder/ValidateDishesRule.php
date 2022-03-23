<?php

namespace App\Rules\CreateOrder;

use App\Models\Dish;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Exceptions\HttpResponseException;

class ValidateDishesRule implements Rule
{
    /**
     * Проверка того, что блюда из одного заказа
     * должны быть только из одного ресторана
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
     * @param string $attribute имя проверяемого атрибута
     * @param mixed $dish_id его значение
     * @return bool
     */
    public function passes($attribute, $dish_id)
    {

        // Throw exception if product doesn't exist
        $curDish = Dish::find($dish_id);

        if (!$curDish) {
            throw new HttpResponseException(response()->json(
                [
                    'success' => 'false',
                    'message' => 'There is no dish with ID: ' . $dish_id
                ],
                400)
            );
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
        return 'The validation error message.';
    }
}

<?php

namespace App\Rules\CreateOrder;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use Illuminate\Contracts\Validation\Rule;

class CreateOrderValidateTokenRule implements Rule
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
     * Проверка на то, что user_id в заказе и токен авторизации совпадают.
     * Пользователь может делать заказ только под своим id
     *
     * @param string $attribute name of attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return collect(request()->user())['id'] === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute token and user_id in order should be equal';
    }
}

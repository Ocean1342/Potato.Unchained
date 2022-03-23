<?php
declare(strict_types=1);
namespace App\Rules\CreateOrder;

use App\Http\Controllers\Api\Order\Requests\ApiOrderRequest;
use Illuminate\Contracts\Validation\Rule;

class ValidateUserTokenRule implements Rule
{
    /**
     * The authorization token must belong to the user from the order
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     *
     * @param string $attribute name of attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value): bool
    {
        return collect(request()->user())['id'] === (int) $value;
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

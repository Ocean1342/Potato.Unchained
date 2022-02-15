<?php

namespace App\Http\Controllers\Api\Order\Requests;

use App\Rules\CreateOrder\CreateOrderValidateTokenRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiOrderRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.id' => ['required','int',new CreateOrderValidateTokenRule()],
            'dishes' => 'required',
            'dishes.*.dish_id' => 'required|int|max:255',
            'dishes.*.amount' => 'required|int|min:1|max:100'
        ];
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], 400));
    }

}

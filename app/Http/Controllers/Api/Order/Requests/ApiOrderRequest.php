<?php

namespace App\Http\Controllers\Api\Order\Requests;

use App\Rules\CreateOrder\ValidateDishesArray;
use App\Rules\CreateOrder\ValidateDishesRule;
use App\Rules\CreateOrder\ValidateUserTokenRule;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

/**
 *
 */
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
            'user.id' => ['required','int',new ValidateUserTokenRule()],
            'dishes' => ['required',new ValidateDishesArray()],
            'dishes.*.dish_id' => ['required','integer'],
            'dishes.*.amount' => 'required|int|min:1|max:100'
        ];
    }

    /**
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors',
            'data' => $validator->errors()
        ], 400));
    }

}

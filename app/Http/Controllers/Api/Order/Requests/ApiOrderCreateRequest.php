<?php

namespace App\Http\Controllers\Api\Order\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ApiOrderCreateRequest extends FormRequest
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
            //валидация не работает
            //'dishes.dish_id' => 'required|int|max:255',
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

    public function messages()
    {
        return [
            'dishes.dish_id.required' => 'dish_id is required. ',
            'dishes.dish_id.int' => 'Should be int.',
            'dishes.dish_id.max' => 'max length 50'
        ];
    }

}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class RequestsValidation extends FormRequest
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
        $rulesAddRequest = [
            'name' => 'required|string',
            'email' => 'required|email:rfc,dns',
            'message' => 'required|string'
        ];

        $rulesUpdateRequest = [
            'comment' => 'required|string'
        ];
        
        switch ($this->getMethod())
        {
            case 'POST':
                return $rulesAddRequest;
            case 'PUT':
                return $rulesUpdateRequest;
            default:
                return null;
        }
    }

    public function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success'   => false,
            'data'      => $validator->errors()
        ]));

    }

    public function messages() {
        return [
            'name.required' => 'Поле имя обязателен',
            'email.required' => 'Поле email обязателен',
            'message.required' => 'Поле сообщение обязателен'
        ];
    }
}

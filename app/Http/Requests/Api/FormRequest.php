<?php

namespace App\Http\Requests\Api;

use App\API\Helpers\CodeResponse;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class FormRequest extends BaseFormRequest
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

    protected function failedValidation(Validator $validator)
    {
        [$code, $message] = CodeResponse::VALIDATION_FAILS;
        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'code' => $code,
            'message' => $message,
            'data' => $validator->errors()->all(),
        ]));
    }
}

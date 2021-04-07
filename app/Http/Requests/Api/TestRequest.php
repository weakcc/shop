<?php

namespace App\Http\Requests\Api;

class TestRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            'pwd' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '名字不能为空',
            'pwd.required' => '密码不能为空',
        ];
    }
}

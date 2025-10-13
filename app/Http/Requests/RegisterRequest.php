<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'min:8', 'confirmed'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => '이름을 입력해 주십시오.',
            'name.max' => '이름은 최대 20자까지 입력할 수 있습니다.',
            'email.required' => '메일 주소를 입력해 주십시오.',
            'email.email' => '메일 주소 형식이 올바르지 않습니다.',
            'email.unique' => '이미 사용 중인 메일 주소입니다.',
            'password.required' => '비밀번호를 입력해 주십시오.',
            'password.min' => '비밀번호는 최소 8자 이상이어야 합니다.',
            'password.confirmed' => '비밀번호 확인이 일치하지 않습니다.',
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '이름',
            'email' => '메일 주소',
            'password' => '비밀번호',
        ];
    }
}

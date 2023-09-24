<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
            'employee_id' => ['required', 'integer', 'exists:employees,id'],
            'lastname' => ['required', 'string', 'max:40'],
            'firstname' => ['required', 'string', 'max:40'],
            'lastname_kana' => ['required', 'string', 'regex:/^[ァ-ヶー]+$/u', 'max:50'],
            'firstname_kana' => ['required', 'string', 'regex:/^[ァ-ヶー]+$/u', 'max:50'],
            'employee_photo_path' => ['nullable', 'image', 'mimes: jpg,jpeg,png', 'max:2048'],
            'birth' => ['nullable', 'date', 'after:1900-01-01', 'before:today'],
            'gender' => ['nullable', 'string', 'max:10'],
            'zipcode' => ['required', 'string', 'max:10'],
            'address1' => ['required', 'string', 'max:20'],
            'address2' => ['required', 'string', 'max:30'],
            'address3' => ['required', 'string', 'max:50'],
            'address4' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:20'],
            'status' => ['required'],
            'role' => ['required', 'string', 'max:20'],
            'start_date' => ['required', 'date'],
        ];
    }

    public function messages()
    {
        return [
            'image' => '指定されたファイルが画像ではありません。',
            'mines' => '指定された拡張子（jpg/jpeg/png）ではありません。',
            'max' => 'ファイルサイズは2MB以内にしてください。',
        ];
    }
}

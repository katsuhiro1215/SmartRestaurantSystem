<?php

namespace App\Http\Requests\Update;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEmployeeProfileRequest extends FormRequest
{
    public function rules()
    {
        return [
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
            'mobile_number' => ['required', 'string', 'max:20'],
            'fax_number' => ['nullable', 'string', 'max:20'],
            'website' => ['nullable', 'url', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'instargram' => ['nullable', 'url', 'max:255'],
            'youtube' => ['nullable', 'url', 'max:255'],
            'line' => ['nullable', 'url', 'max:255'],
        ];
    }

    public function messages()
    {
        return [
            'lastname_kana.regex' => '姓のフリガナは全角カタカナで入力してください。',
            'firstname_kana.regex' => '名のフリガナは全角カタカナで入力してください。',

            'employee_photo_path.image' => '指定されたファイルが画像ではありません。',
            'employee_photo_path.mines' => '指定された拡張子（jpg/jpeg/png）ではありません。',
            'employee_photo_path.max' => 'ファイルサイズは2MB以内にしてください。',

            'birth.after' => '生年月日は1910年1月1日以降でお書きください。',
            'birth.before' => '生年月日は今日より前の年月日でお書きください。',

            'role.required' => '役割を入力してください。',
            'role.string' => '役割は文字列を入力してください。',
            'role.max' => '役割は20文字以内で入力してください。',
        ];
    }
}

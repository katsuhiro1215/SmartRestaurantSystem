<?php

namespace App\Http\Requests\Store;

use App\Models\Shop;
use Illuminate\Foundation\Http\FormRequest;

class StoreShopRequest extends FormRequest
{
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'max:50'],
            'type' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.Shop::class],
            'shop_photo_path' => ['nullable' , 'image' , 'mimes: jpg,jpeg,png' , 'max:2048'],
            'shop_logo_path' => ['nullable' , 'image' , 'mimes: jpg,jpeg,png' , 'max:2048'],
            'zipcode' => ['required', 'string', 'max:10'],
            'address1' => ['required', 'string', 'max:20'],
            'address2' => ['required', 'string', 'max:30'],
            'address3' => ['required', 'string', 'max:50'],
            'address4' => ['required', 'string', 'max:100'],
            'phone_number' => ['required', 'string', 'max:20'],
            'fax_number' => ['nullable', 'string', 'max:20'],
            'website' => ['nullable', 'url', 'max:255'],
            'facebook' => ['nullable', 'url', 'max:255'],
            'twitter' => ['nullable', 'url', 'max:255'],
            'instargram' => ['nullable', 'url', 'max:255'],
            'youtube' => ['nullable', 'url', 'max:255'],
            'line' => ['nullable', 'url', 'max:255'],
            'established_date' => ['nullable', 'date'],
            'status' => ['required', 'boolean', 'in:0,1'],
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

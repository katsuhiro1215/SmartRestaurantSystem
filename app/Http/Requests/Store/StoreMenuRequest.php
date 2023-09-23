<?php

namespace App\Http\Requests\Store;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    public function rules()
    {
        return [
            'menu_category_id' => ['required', 'integer', 'exists:menu_categories,id'],
            'name' => ['required', 'string', 'max:100'],
            'name_en' => ['required', 'string', 'max:100'],
            'description' => ['nullable', 'string'],
            'description_en' => ['nullable', 'string'],
            'detai' => ['nullable', 'string'],
            'detai_en' => ['nullable', 'string'],
            'selling_price' => ['required', 'integer'],
            'discount_price' => ['nullable', 'integer'],
            'menu_photo_path' => ['nullable', 'image', 'mimes: jpg,jpeg,png', 'max:2048'],
            'hot_deals' => ['required', 'boolean'],
            'featured' => ['required', 'boolean'],
            'special_offer' => ['required', 'boolean'],
            'special_deals' => ['required', 'boolean'],
            'status' => ['required', 'boolean'],
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

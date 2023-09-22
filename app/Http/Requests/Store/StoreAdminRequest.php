<?php

namespace App\Http\Requests\Store;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class StoreAdminRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email', 'max:255', Rule::unique(Admin::class)->ignore($this->user()->id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}

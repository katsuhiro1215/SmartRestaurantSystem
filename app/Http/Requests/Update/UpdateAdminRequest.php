<?php

namespace App\Http\Requests\Update;

use App\Models\Admin;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateAdminRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email', 'max:255', Rule::unique(Admin::class)->ignore($this->user()->id)],
        ];
    }
}

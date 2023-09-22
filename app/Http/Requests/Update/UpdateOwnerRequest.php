<?php

namespace App\Http\Requests\Update;

use App\Models\Owner;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateOwnerRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email', 'max:255', Rule::unique(Owner::class)->ignore($this->user()->id)],
        ];
    }
}

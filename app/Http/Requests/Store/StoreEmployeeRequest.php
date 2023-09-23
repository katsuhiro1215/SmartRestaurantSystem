<?php

namespace App\Http\Requests\Store;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class StoreEmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email', 'max:255', Rule::unique(Employee::class)->ignore($this->user()->id)],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ];
    }
}

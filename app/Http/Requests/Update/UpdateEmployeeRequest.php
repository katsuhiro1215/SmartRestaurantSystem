<?php

namespace App\Http\Requests\Update;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateEmployeeRequest extends FormRequest
{
    public function rules()
    {
        return [
            'email' => ['email', 'max:255', Rule::unique(Employee::class)->ignore($this->user()->id)],
        ];
    }
}

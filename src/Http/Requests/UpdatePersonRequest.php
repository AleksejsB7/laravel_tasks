<?php

namespace Testsproject\LaravelTasks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        //velak
        return true; 
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'string', 'max:255'],
            'bio'  => ['sometimes', 'string'],
        ];
    }
}

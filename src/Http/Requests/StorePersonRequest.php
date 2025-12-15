<?php

namespace Testsproject\LaravelTasks\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePersonRequest extends FormRequest
{
    public function authorize(): bool
    {
        // allow all requests for now
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'bio'  => ['nullable', 'string'],
        ];
    }
}

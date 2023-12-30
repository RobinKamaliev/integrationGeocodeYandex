<?php

declare(strict_types=1);

namespace App\Http\Requests\Coordinate;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'latitude' => 'required',
            'longitude' => 'required',
            'user_id' => 'int',
        ];
    }
}

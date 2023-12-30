<?php

declare(strict_types=1);

namespace App\Http\Requests\Coordinate;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_datetime' => 'required',
            'to_datetime' => 'required',
            'paginate' => 'required|int',
        ];
    }
}

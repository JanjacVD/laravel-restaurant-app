<?php

namespace App\Http\Requests;

use Facade\FlareClient\Truncation\TruncationStrategy;
use Illuminate\Foundation\Http\FormRequest;

class StoreDate extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'noDate' => 'required|unique:dates_offs'
        ];
    }
}

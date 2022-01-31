<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFoodItem extends FormRequest
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
            'title' => 'required|min:2|max:150',
            'title_en' => 'required|min:2|max:150',
            'desc' => 'max:250',
            'desc_en' => 'max:250',
            'price' => 'required|min:1|max:150',
            'active' => 'required',
            'category_id' => 'required'
        ];
    }
}

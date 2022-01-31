<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTime extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'active' => 'required',
            'day1' => 'required',
            'day2' => 'required',
            'time1' => 'required',
            'time2' => 'required'
        ];
    }
}

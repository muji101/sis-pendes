<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeathRequest extends FormRequest
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
            'resident_id' => 'required',
            'date' => 'required',
            'time' => 'required',
            'age' => 'required',
            'reason' => 'required',
        ];
    }
}

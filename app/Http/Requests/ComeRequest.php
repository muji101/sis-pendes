<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComeRequest extends FormRequest
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
            'nik' => 'required',
            'name' => 'required',
            'birthplace' => 'required',
            'birthdate' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'last_education' => 'required',
            'address' => 'required',
            'work' => 'required',
            'blood_type' => 'required',
            'martial_status' => 'required',
            'citizenship' => 'required',
            'arrival_date' => 'required',
            'resident_id' => 'required'
        ];
    }
}

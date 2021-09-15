<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ResidentRequest extends FormRequest
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
            'name' => 'required|string',
            'birthplace' => 'required|string',
            'birthdate' => 'required',
            'gender' => 'required',
            'religion' => 'required',
            'last_education' ,
            'work',
            'blood_type',
            'martial_status' => 'required',
            'citizenship' => 'required',
            'status'
        ];
    }

    // public function messages()
    // {
    //     return [
    //         'nik.required'        => 'NIK wajib di isi',
    //         'name.required'        => 'Nama wajib di isi',
    //         'name.string'          => 'Nama harus di isi dengan teks',
    //         // 'birthplace.required'             => 'Tempat lahir wajib di isi',
    //         // 'title.max'             => 'Judul maksimal 200 karakter',
    //         // 'content.required'      => 'Content wajib di isi',
    //         // 'image_file.required'   => 'Gambar wajib di isi',
    //         // 'user_id.required'      => 'Penulis wajib di isi',
    //         // 'category_id.required'  => 'Kategori wajib di isi'
    //     ];
    // }
}

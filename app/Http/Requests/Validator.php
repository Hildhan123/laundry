<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Validator extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
        ];
    }
    public function messages(){
        return [
            'required' => ':attribut wajib disini.',
            'size' => ':attribut harus berukuran :size karakter.',
            'max' => ':attribut maksimal berisi :max karakter.',
            'min' => ':attribut minima berisi :min karakter.',
            'numeric' => ':attribut harus angka.',
            'unique' => ':data sudah dibuat'
        ];
    }
}

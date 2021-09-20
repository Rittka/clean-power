<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateStudentRequest extends FormRequest
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
            'first_name'    => 'string|required|max:255',
            'last_name'     => 'string|required|max:255',
            'gender'        => 'string|required|in:F,M',
            'birth'         => 'required|numeric',
            'mobile'        => 'required|min:10',
            'address'             => 'required|string|min:3|max:50',
            'rent'                 => 'nullable|in:F,T',
            'father_name'         => 'nullable|string|max:255',
            'father_birth'       => 'nullable',
            'father_education_level'   => 'nullable',
            'father_job'         => 'nullable|string|max:255',
            'father_salary'      => 'nullable|numeric',
            'mother_name'        => 'nullable|string|max:255',
            'mother_birth'       => 'nullable',
            'mother_education_level'   => 'nullable',
            'mother_job'         => 'nullable|string|max:255',
            'mother_salary'      => 'nullable|numeric',
            'visited_from'  => 'required|numeric',
            'visited_date'  => 'required|numeric',
            'section_id'    => 'required|numeric',
            'payment'       => 'required|numeric',

        ];
    }
}

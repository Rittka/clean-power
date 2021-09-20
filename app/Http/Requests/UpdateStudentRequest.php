<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStudentRequest extends FormRequest
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
            'first_name'    => 'filled|string|max:255',
            'last_name'     => 'filled|string|max:255',
            'gender'        => 'filled|string|in:M,F',
            'birth'         => 'numeric|filled',
            'mobile'        => 'filled|digits:10',
            'address'       => 'filled|string|min:3|max:50',
            'rent'          => 'filled|boolean',
            'father_name'   => 'filled|string|max:255',
            'father_birth'       => 'filled|',
            'father_education_level'   => 'filled',
            'father_job'         => 'filled|string|max:255',
            'father_salary'      => 'filled|numeric',
            'mother_name'   => 'filled|string|max:255',
            'mother_birth'       => 'filled',
            'mother_education_level'   => 'filled',
            'mother_job'         => 'filled|string|max:255',
            'mother_salary'      => 'filled|numeric',
            'visited_from'  => 'filled|numeric',
            'visited_date'  => 'filled',
            'section_id'    => 'filled|numeric',
            'payment'       => 'filled|numeric',
        ];
    }
}

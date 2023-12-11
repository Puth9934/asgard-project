<?php

namespace Modules\Student\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateStudentRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'department_id' => 'required',
            'group_id' => 'required',
            'dob' => 'required',
            'phone' => 'required',
            'email'=> 'required',
            'gender_id' => 'required'
        ];
    }

    public function translationRules()
    {
        return [
            'first_name' => 'required',
            'last_name'=> 'required',
            'address' =>  'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'department_id.required'=> 'Pleace chosen department',
            'group_id.required' => 'Pleace chosen group',
            'dob.required' => 'Date of Birth field is required',
        ];
    }

    public function translationMessages()
    {
        return [
            'first_name.required' => 'first_name field is required.',
            'last_name.required'=> 'last_name field is required.',
            'address.required' => 'address field is required',
        ];
    }
}

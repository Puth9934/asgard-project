<?php

namespace Modules\TeacherMgt\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateTeacherRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'email' => 'required',
            'dob'=> 'required',
            'phone'=> 'required',
            'gender_id'=> 'required',
            'hire_date'=> 'required',
            'subjects_id'=> 'required',
            'department_id'=> 'required',
        ];
    }

    public function translationRules()
    {
        return [
            'first_name' => 'required',
            'last_name'=> 'required',
            'address'=> 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'gender_id.required' => 'gender field is required',
        ];
    }

    public function translationMessages()
    {
        return [
            'first_name.required' => 'first_name field is required',
            'last_name.required'=> 'last_name field is required',
            'address.required'=> 'address field is required',
        ];
    }
}

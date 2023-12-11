<?php

namespace Modules\StaffMgt\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateStaffRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
           'dob' => 'required',
           'hire_date' => 'required',
           'gender_id' => 'required',
           'department_id' => 'required'
        ];
    }

    public function translationRules()
    {
        return [
            'name' => 'required|min:2',
            'description' => 'required'
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
           'dob.required' => 'dob field is required',
           'hire_date.required'=> 'hire_date field is required.',
           'gender_id.required'=> 'gender_id field is required.',
           'department_id.required'=> 'department_id field is required.',

        ];
    }

    public function translationMessages()
    {
        return [
            'name.required' => 'Name is required.',
            'name.min' => 'name must be at least 2 characters.',
            'description.required'=> 'description field is required.',

        ];
    }
}

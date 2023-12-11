<?php

namespace Modules\Student\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdateGroupRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            'name' =>'required',

        ];
    }

    public function translationRules()
    {
        return [
            'department_id' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'name.required' => 'Group name field is required',
        ];
    }

    public function translationMessages()
    {
        return [
            'department.required' => 'Department field is required',
        ];
    }
}

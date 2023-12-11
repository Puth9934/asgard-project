<?php

namespace Modules\Student\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreateDepartmentRequest extends BaseFormRequest
{
    public function rules()
    {
        return [];
    }

    public function translationRules()
    {
        return [
            'name' => 'required',
        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [];
    }

    public function translationMessages()
    {
        return [
            'name.required'=> 'Department field is required',
        ];
    }
}

<?php

namespace Modules\Teachermgt\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class CreatesubjectsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
            // 'subjects_id' => 'required'

        ];
    }

    public function translationRules()
    {
        return [

        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            // 'subjects_id.required' => 'subject name field is required'

        ];
    }

    public function translationMessages()
    {
        return [

        ];
    }
}

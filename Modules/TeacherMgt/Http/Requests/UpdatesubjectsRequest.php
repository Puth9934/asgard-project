<?php

namespace Modules\Teachermgt\Http\Requests;

use Modules\Core\Internationalisation\BaseFormRequest;

class UpdatesubjectsRequest extends BaseFormRequest
{
    public function rules()
    {
        return [
        ];
    }

    public function translationRules()
    {
        return [
            // 'subjects_id' => 'required'

        ];
    }

    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
        ];
    }

    public function translationMessages()
    {
        return [
            // 'subjects_id.required' => 'subject name field is required'

        ];
    }
}

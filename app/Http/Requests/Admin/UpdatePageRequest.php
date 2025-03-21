<?php

namespace App\Http\Requests\Admin;

use App\Helpers\ModelHelper;
use App\Models\Page;
use Illuminate\Foundation\Http\FormRequest;

class UpdatePageRequest extends FormRequest
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
        $rules = Page::$rules;

        return $rules;
    }

    public function attributes()
    {
        return ModelHelper::modelAttributeLabels(Page::class);
    }
}

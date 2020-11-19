<?php

namespace App\Http\Requests\Admin;

use App\Helpers\RequestHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Page;

class CreatePageRequest extends FormRequest
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
        return Page::$rules;
    }

    public function attributes()
    {
        return RequestHelper::modelAttributeLabels(Page::class);
    }
}

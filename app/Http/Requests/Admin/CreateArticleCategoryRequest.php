<?php

namespace App\Http\Requests\Admin;

use App\Helpers\ModelHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\ArticleCategory;

class CreateArticleCategoryRequest extends FormRequest
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
        return ArticleCategory::$rules;
    }

    public function attributes()
    {
        return ModelHelper::modelAttributeLabels(ArticleCategory::class);
    }
}

<?php

namespace App\Http\Requests\Admin;

use App\Helpers\RequestHelper;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\Article;

class UpdateArticleRequest extends FormRequest
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
        $rules = Article::$rules;

        return $rules;
    }

    public function attributes()
    {
        return RequestHelper::modelAttributeLabels(Article::class);
    }
}

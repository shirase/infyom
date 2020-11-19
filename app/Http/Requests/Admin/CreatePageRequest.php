<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Page;
use Illuminate\Support\Str;

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
        /** @var \Illuminate\Contracts\Translation\Loader|\Illuminate\Translation\FileLoader $translationLoader */
        $translationLoader = app('translation.loader');
        $fields = $translationLoader->load('ru', 'fields');
        return $fields[Str::snake(class_basename(Page::class))] ?? [];
    }
}

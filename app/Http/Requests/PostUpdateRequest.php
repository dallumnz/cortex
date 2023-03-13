<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
        return [
            'slug' => ['nullable', 'max:255', 'string'],
            'title' => ['required', 'max:255', 'string'],
            'description' => ['required', 'max:255', 'string'],
            'keywords' => ['required', 'max:255', 'string'],
            'tags' => ['required', 'max:255', 'string'],
            //'status' => ['required', 'boolean'],
            'visibility' => ['required', 'boolean'],
            //'featured' => ['required', 'boolean'],
            //'breaking' => ['required', 'boolean'],
            //'recommended' => ['required', 'boolean'],
            //'headline' => ['required', 'boolean'],
            'post_type' => ['required', 'max:255', 'string'],
            'category_id' => ['required', 'exists:categories,id'],
            'subcategory_id' => ['required', 'exists:subcategories,id'],
            //'created_by' => ['required', 'exists:users,id'],
        ];
    }
}

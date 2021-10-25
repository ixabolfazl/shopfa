<?php

namespace App\Http\Requests\Admin\Content;

use Illuminate\Foundation\Http\FormRequest;

class PostCategoryRequest extends FormRequest
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
        // for store request
        if ($this->isMethod('post')) {
            return [
                'name' => 'required',
                'description' => 'required',
                'slug' => 'nullable',
                'image' => 'required',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',

            ];
        } // for update request
        else {
            return [
                'name' => 'required',
                'description' => 'required',
                'slug' => 'nullable',
                'image' => 'nullable',
                'status' => 'required|numeric|in:0,1',
                'tags' => 'required',
            ];
        }

    }

    public function attributes()
    {
        return [
            'name' => 'نام',
            'description' => 'توضیحات',
            'image' => 'عکس',
            'status' => 'وضعیت',
            'tags' => 'تگ ها',
        ];
    }
}

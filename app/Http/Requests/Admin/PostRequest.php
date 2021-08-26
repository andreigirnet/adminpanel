<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PostRequest extends FormRequest
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
    public function prepareForValidation(){
        $this->merge([
            'slug'=> Str::slug($this->title)
        ]);
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>['required',
            'max:250',
            Rule::unique('posts','title')->
            ignore($this->post)],

            'excerpt'=>['required',
            'max:10',

            ]
        ];
    }
    public function messages(){
        return [
            'title.required'=>'A title is required',
            'title.max'=>'A title cannot be more than 250 characters ',
            'excerpt.max'=>'A title cannot be more than 10 characters '
        ];
    }
}

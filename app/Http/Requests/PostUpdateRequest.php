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
        //dd($this->tag);
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts,slug,' . $this->post,
            'district' => 'required',
            'user_id' => 'required|integer',
            'category_id' => 'required|integer',
            'tags' => 'required|array',
            'body' => 'required',
            'status' => 'required|in:DRAFT,PUBLISHED',
        ];

        if ($this->get('file')) {
            $rules = array_marge($rules, ['file' => 'mimes:jpg,jpeg,png']);
        };

        return $rules;
    }
}

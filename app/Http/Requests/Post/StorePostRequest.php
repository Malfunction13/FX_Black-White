<?php

namespace App\Http\Requests\Post;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StorePostRequest extends FormRequest
{

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return $this->user()->can('store', Post::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request) {
        $rules = [
            //unique:table_name,column_name,id_to_ignore
            'title' => 'required|between:20,120|unique:posts,title,',
            'text' => 'required|between:200,1500',
            'image' => 'required|max:2048'
        ];

        if ($this->getMethod() === 'POST') { // create post

            return $rules;
        }

        // when updating all fields are optional
        $rules['title'] = $rules['title'] . $request->post->id;
        return str_replace('required|', '', $rules); //required| must be first argument always
    }
}

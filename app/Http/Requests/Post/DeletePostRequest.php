<?php

namespace App\Http\Requests\Post;


use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class DeletePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return $this->user()->can("delete", Post::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            //
        ];
    }

    protected function failedAuthorization() {

        throw new HttpResponseException(response()->redirectToRoute('postOverview')
            ->with(['error' => 'This action is not authorized!']));
    }



}

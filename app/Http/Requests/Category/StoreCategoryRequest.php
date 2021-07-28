<?php

namespace App\Http\Requests\Category;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreCategoryRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return $this->user()->can('store', Category::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        if ($this->getMethod() === 'POST') {
            return [
                'name' => 'required|alpha_num|min:1',
            ];
        } else if ($this->getMethod() === 'PATCH')
            return [
                'new_name' => 'required|alpha_num|min:1',
            ];

        return [
            //delete doesnt need rules
        ];
    }

    protected function failedAuthorization() {

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'This action is not authorized!'], 401));
    }
}

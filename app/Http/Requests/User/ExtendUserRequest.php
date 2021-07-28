<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ExtendUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return $this->user()->can('extend', User::class);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {

        return [
            'months' => 'integer|min:1',
        ];
    }

    protected function failedAuthorization() {

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'This action is not authorized!']));
    }
}

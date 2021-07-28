<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ActivateUserRequest extends FormRequest {
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {

        return $this->user()->can('activate', User::class);
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

        throw new HttpResponseException(response()->json([
            'status' => 'error',
            'message' => 'This action is not authorized!']));
    }
}

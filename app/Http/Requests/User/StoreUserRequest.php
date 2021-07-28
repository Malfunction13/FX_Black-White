<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        if ($this->getMethod() === 'PATCH') {
            return $this->user()->can('update', User::class);
        }

        return !auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(Request $request) {
        if ($this->getMethod() === 'POST') { // create post
            $rules = [
                'username' => 'required|between:3,20|unique:users',
                'password' => 'required|between:6,20',
                'email' => 'required|email|unique:users',
            ];
            return $rules;
        }

        if ($this->getMethod() === 'PATCH') {
            $rules = [
                'username' => 'between:3,20|unique:users,username,' . $request->user->id,
                'email' => 'email|unique:users,email,'  . $request->user->id,
                'role' => 'integer',
                'subscribed' => 'boolean',
                'expiry_date' => 'date_format:d-m-Y',
                'months' => 'integer|min:1'];

            return $rules;
        }
    }

    protected function failedAuthorization() {
        if ($this->ajax()) {
            throw new HttpResponseException(response()->json([
                'status' => 'error',
                'message' => 'This action is not authorized!']));
        }
        throw new HttpResponseException(response()->redirectToRoute('register')
            ->with(['error' => 'You are already registered!']));
    }
}

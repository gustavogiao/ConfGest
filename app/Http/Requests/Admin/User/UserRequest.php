<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    public function rules()
    {
        if ($this->isMethod('post')) {
            // Regras para criação
            return [
                'firstname'     => 'required|string|max:255',
                'lastname'      => 'required|string|max:255',
                'username'      => 'required|string|max:255|unique:users,username',
                'user_type_id'  => 'required|exists:user_types,id',
                'email'         => 'required|email|unique:users,email',
                'password'      => 'required|string|min:6|confirmed',
                'description'   => 'required|string',
                'is_active'     => 'required|boolean',
            ];
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Regras para edição
            return [
                'user_type_id'  => 'required|exists:user_types,id',
                'is_active'     => 'required|boolean',
            ];
        }

        return [];
    }
}

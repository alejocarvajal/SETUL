<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\User;
use Illuminate\Support\Facades\DB;

class CreateUserRequest extends FormRequest
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
        return [
            'nombre' => 'required',
            'email' => ['required', 'email', 'unique:users,email'],
            'clave' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El campo nombre es obligatorio'
        ];
    }

    public function createUser()
    {
        DB::transaction(function (){
            $data = $this->validated();
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'clave' => bcrypt($data['password'])
            ]);
        });
    }
}

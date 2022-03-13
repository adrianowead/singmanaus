<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ProfileRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::user()->isAdmin();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nome' => 'required',
            'email' => 'required|email',
            'senha' => 'required|min:5|max:200',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'O nome é obrigatório',
            'email.required' => 'O e-mail é obrigatório',
            'senha.required' => 'A senha é obrigatória',

            'email.email' => 'O e-mail informado é inválido',

            'senha.min' => 'A senha deve ter no mínimo :min caracteres',
            'senha.max' => 'A senha deve ter no máximo :max caracteres',
        ];
    }
}

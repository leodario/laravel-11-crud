<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nome'=> 'required',
            'cpf'=> 'required',
            'email'=> 'required',
            'fone'=> 'required',
            'nascimento'=> 'required',
        ];
    }

    public function messages():array{
        return [
            'nome.required'=> 'O campo nome é obrigatório',
            'cpf.required'=> 'O campo cpf é obrigatório',
            'email.required'=> 'O campo email é obrigatório',
            'fone.required'=> 'O campo fone é obrigatório',
            'nascimento.required'=> 'O campo nascimento é obrigatório',
        ];
    }
}

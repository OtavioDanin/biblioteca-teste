<?php

namespace Modules\Livros\Application;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookRequest extends FormRequest
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
            'titulo' => 'required|string|max:40',
            'valor' => 'required|numeric|min:0|regex:/^\d+(\.\d{1,2})?$/',
            'editora' => 'required|string|max:40',
            'edicao' => 'required|integer|min:1',
            'ano_publicacao' => 'required|string|max:4',
            'autores' => 'nullable|array',
            'autores.*' => 'exists:autores,cod_au',
            'assuntos' => 'nullable|array',
            'assuntos.*' => 'exists:assuntos,cod_as',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required' => 'O campo “titulo” é obrigatório.',
            'valor.required' => 'O campo "valor" é obrigatório.',
            'editora.required' => 'O campo "editora" é obrigatório.',
            'edicao.required' => 'O campo "edição" é obrigatório.',
        ];
    }
}

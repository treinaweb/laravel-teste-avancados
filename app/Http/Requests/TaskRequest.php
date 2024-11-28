<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
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
            'tarefa' => ['required', 'min:5']
        ];
    }

    public function messages() :array
    {
        return [
            'tarefa.required' => 'Preencha o campo tarefa',
            'tarefa.min' => 'Tamanho mínimo para a tarefa é 5 caracteres'
        ];
    }
}

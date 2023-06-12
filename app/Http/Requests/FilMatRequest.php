<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilMatRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'filiere_id'=>'required|exists:filieres,id|integer',
            'matiere_id'=>'required|exists:matieres,id|integer',
            'credit'=>'required|integer',
            'masse'=>'required|integer',
        ];
    }
}

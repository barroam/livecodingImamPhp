<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UpdateLivreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'isbn' => ['sometimes', 'string', 'unique:livres,isbn'],
            'titre' => ['sometimes', 'string', 'max:255'],
            'auteur' => ['sometimes', 'string', 'max:255'],
            'categorie_id' => ['sometimes', 'exists:categories,id'],
            'date_publication' => ['sometimes', 'date'],
            'quantite' => ['sometimes', 'integer'],
            'image' => ['sometimes', 'string'],
        ];
    }

    /**
     * Handle a failed validation attempt.
     */
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422));
    }


}

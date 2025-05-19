<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticoliRequest extends FormRequest
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
            'titolo' => 'required|string|max:255',
            'tags' => 'required|string',
            'body' => 'required|string|max:1000',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }

    public function messages()
    {
        return [
            'titolo.required' => 'Il titolo dell articolo è obbligatorio.',
            'tags.required' => 'è necessario alemno un tag',
            'body.required' => 'Il contenuto dell articolo è obbligatirio.',
            'img.image' => 'Il file caricato deve essere un\'immagine.',
            'img.mimes' => 'L\'immagine deve essere in uno dei seguenti formati: jpeg, png, jpg, gif.',
            'img.max' => 'L\'immagine non può superare i 2MB.',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            "title" => "required|string|max:255",
            "content" => "required|string",
            "image" => "image|mimes:jpeg,png,jpg|max:4096",
        ];
    }

    public function messages()
    {
        return [
            "title.required" => "Il titolo è obbligatorio.",
            "title.string" => "Il titolo deve essere una stringa.",
            "title.max" => "Il titolo non può superare i 255 caratteri.",
            "content.required" => "Il contenuto è obbligatorio.",
            "content.string" => "Il contenuto deve essere una stringa.",
            "image.image" => "Il file caricato deve essere un'immagine.",
            "image.mimes" => "L'immagine deve essere in uno dei seguenti formati: jpeg, png, jpg, gif, svg.",
            "image.max" => "L'immagine non può superare i 4MB.",
        ];
    }
}

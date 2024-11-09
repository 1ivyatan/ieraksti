<?php

namespace App\Http\Requests\Content;

use Illuminate\Foundation\Http\FormRequest;

class MusicCreateRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "title" => "required|string|max:255",
            "cover" => "nullable|image",
            "audio" => "required|file|mimes:mp3|max:25600"
        ];
    }
}

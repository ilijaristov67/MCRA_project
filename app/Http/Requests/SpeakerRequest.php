<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SpeakerRequest extends FormRequest
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
            'info' => 'required|max:255',
            'title' => 'required|max:45',
            'social_media' => 'required',
            'is_special' => 'required',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'last_name' => 'required',
        ];
    }
}

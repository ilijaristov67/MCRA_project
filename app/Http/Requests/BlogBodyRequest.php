<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogBodyRequest extends FormRequest
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
            'blog_id' => 'required|exists:blogs,id',
            'subtitle' => 'required|max:255',
            'sub_content' => 'required'
        ];
    }
}

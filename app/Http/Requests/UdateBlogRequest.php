<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UdateBlogRequest extends FormRequest
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
            'title' => 'required|max:255|unique:blogs,title',
            'main_content' => 'required|min:10',
            'category_id' => 'required|exists:cateogries,id'
        ];
    }
}

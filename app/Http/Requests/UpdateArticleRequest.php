<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "user_id"=>["required", "integer", "exists:users,id"],
            "category_id"=>["required","integer", "exists:categories,id"],
            "title"=>["string", "max:255"],
            "content"=>["string"],
            "slug"=>["string", "max:255", "unique:articles,slug"],
        ];
    }
}

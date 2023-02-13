<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            "title" => "required|max:50",
            "description" => "required",
            "tags" => "max:50",
            "project_date" => "required|date|before_or_equal:now",
            "img" => "nullable|image|mimes:jpg,png,jpeg,gif|max:2048",
            "repo" => "nullable|URL"
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileImageRequest extends FormRequest
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
            'image' => 'required|file|image|mimes:png,jpg,jpeg|dimensions:min_width=50,min_height=50,max_width=1000,max_height=1000',
        ];
    }

    public function messages()
    {
        return [
            'image.required' => '画像を選択してください。',
        ];
    }
}

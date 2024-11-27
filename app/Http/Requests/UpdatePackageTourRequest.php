<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePackageTourRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize() : bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules() : array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'thumbnail' => ['sometimes', 'image', 'mimes:png,jpg,jpeg'],
            'about' => ['required', 'string', 'max:65535'],
            'location' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer'],
            'days' => ['required', 'integer'],
            'category_id' => ['required', 'string'],
            'package_photos.*' => ['sometimes', 'image', 'mimes:png,jpg,jpeg']
        ];
    }
}

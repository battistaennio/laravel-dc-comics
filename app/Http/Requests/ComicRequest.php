<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ComicRequest extends FormRequest
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
            'title' => 'required|min:3|max:50',
            'thumb' => 'required|max:255',
            'price' => 'required|min:3|max:10',
            'series' => 'required|min:3|max:150',
            'sale_date' => 'required|date|max:50',
            'type' => 'required|max:50'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Il campo title è obbligatorio',
            'title.min' => 'Il campo title deve contenere almeno :min caratteri',
            'title.max' => 'Il campo title può contenere massimo :max caratteri',

            'thumb.required' => 'Il campo thumb è obbligatorio',
            'thumb.max' => 'Il campo thumb può contenere massimo :max caratteri',

            'price.required' => 'Il campo price è obbligatorio',
            'price.min' => 'Il campo price deve contenere almeno :min caratteri',
            'price.max' => 'Il campo price può contenere massimo :max caratteri',

            'series.required' => 'Il campo series è obbligatorio',
            'series.min' => 'Il campo series deve contenere almeno :min caratteri',
            'series.max' => 'Il campo series può contenere massimo :max caratteri',

            'sale_date.required' => 'Il campo sale_date è obbligatorio',
            'sale_date.date' => 'Non hai inserito una data corretta',
            'sale_date.max' => 'Il campo sale_date può contenere massimo :max caratteri',

            'type.required' => 'Il campo type è obbligatorio',
            'type.max' => 'Il campo type può contenere massimo :max caratteri',
        ];
    }
}

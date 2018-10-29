<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {

        return [
            'propertyType' => 'required|numeric',
            'title' => 'requiredw',
            'condition' => 'required',
            'price' => 'required|numeric',
            'lat' => 'required',
            'lng' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'condition.required' => 'Трябва да изберете състояние на жилището!',
            'title.required' => 'Заглавието за Вашата обява е задължително!',
            'propertyType.required' => 'Типа жилище за Вашата обява е задължителен!',
            'price.required' => 'Цената за Вашата обява е задължителна!',
            'price.numeric' => 'Цената за Вашата обява трябва да бъде в правилен формат!',
            'propertyType.numeric' => 'Типа жилище за Вашата обява трябва да бъде в правилен формат!',
        ];
    }
}

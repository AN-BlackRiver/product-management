<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'nullable|string',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|regex:/^\d+(\.\d{1,2})?$/',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Название товара должно быть заполнено',
            'category_id.required' => 'Категория должна быть указана',
            'price.required' => 'Укажите цену товара'
        ];
    }
}

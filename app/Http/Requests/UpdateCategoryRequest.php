<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateCategoryRequest extends FormRequest
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
            'category_name'=>'required|unique:categories,category_name,'.$this->id,
            'image'=>'nullable|image|mimes:jpeg,png|max:20000',
        ];
    }

    public function messages()
    {
        return [
            'category_name.unique'=>'اسم التصنيف موجود بالفعل',
            'category_image.mimes'=>'jpeg,pngيجب ان يكون امتداد الصورة ',
        ];
    }
}

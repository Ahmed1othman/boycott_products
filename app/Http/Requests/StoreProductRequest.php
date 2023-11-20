<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
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
            'product_name'=>'required|unique:products,product_name',
            'product_code'=>'nullable|unique:products,product_code',
            'company_id'=>'nullable|exists:companies,id',
            'category_id'=>'nullable|exists:categories,id',
            'product_status_id'=>'required|exists:product_statuses,id',
            'product_accept_id'=>'required|exists:product_accepts,id',
            'product_image'=>'nullable|image|mimes:jpeg,png|max:20000',
        ];
    }

    public function messages()
    {
        return [
            'product_name.unique'=>'اسم المنتج موجود بالفعل',
            'product_code.unique'=>'هذا الكود مسجل مسبقا لمنتج اخر',
            'product_image.max'=>'حجم صورة المنتج يجب الا يتعدي ال 15 ميجا',
            'product_image.mimes'=>'jpeg,pngيجب ان يكون امتداد الصورة ',

        ];
    }
}

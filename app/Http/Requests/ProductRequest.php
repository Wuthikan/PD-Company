<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
          'name' => 'required',
          'code' => 'required',
          'width' => 'required|numeric',
          'amount' => 'required|numeric',
        ];
    }
    public function messages()
  {
    return [
      'required' => 'กรุณาข้อมูลให้ครบถ้วน' ,
        'width.numeric' => 'กรุณากรอกความกว้างเฉพาะตัวเลขเท่านั้น',
        'amount.numeric' => 'กรุณากรอกจำนวณสินค้าในคลังเฉพาะตัวเลขเท่านั้น'
    ];
  }
}

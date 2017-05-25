<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ExtraconcreteRequest extends FormRequest
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
          'height' => 'required|numeric',
          'amount' => 'required|numeric',
          'price' => 'required|numeric',
        ];
    }
    public function messages()
  {
    return [
      'required' => 'กรุณาข้อมูลให้ครบถ้วน' ,
        'price.numeric' => 'กรุณากรอกราคาต่อคิวเฉพาะตัวเลขเท่านั้น',
          'amount.numeric' => 'กรุณากรอกจำนวนที่ต้องการเฉพาะตัวเลขเท่านั้น',
            'height.numeric' => 'กรุณากรอกความยาวเฉพาะตัวเลขเท่านั้น'
          ];
  }
}

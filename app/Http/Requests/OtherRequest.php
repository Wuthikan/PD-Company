<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OtherRequest extends FormRequest
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
          'detail' => 'required',
          'price' => 'required|numeric',
        ];
    }
    public function messages()
  {
    return [
      'required' => 'กรุณาข้อมูลให้ครบถ้วน' ,
        'price.numeric' => 'กรุณากรอกราคาเฉพาะตัวเลขเท่านั้น'
    ];
  }
}

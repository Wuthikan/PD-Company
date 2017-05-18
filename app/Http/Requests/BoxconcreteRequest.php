<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BoxconcreteRequest extends FormRequest
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
          'width' => 'required',
          'height' => 'required',
          'amount' => 'required',
          'price' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class addProductRequest extends FormRequest
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
            'name'=>'required|min:5|max:50|unique:products',
            'image'=>'required',
            'descrition'=>'required|max:500',
        ];
    }
    public function message(){
        return [
            'name.required'=>'ten khong duoc de trong',
           
        ];
    }
 
}
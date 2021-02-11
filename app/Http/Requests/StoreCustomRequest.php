<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCustomRequest extends FormRequest
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
                'lastname' => 'required',
                'email' => 'required|email:rfc,dns',
                'password' => 'required',
                'password_confirmation' => 'required',
                'role_id' => 'required'                 
        
        ];
    }

    public function messages()
        {
            return [
                'role_id.required' => 'Please Select Role',    
            ];
        }

}

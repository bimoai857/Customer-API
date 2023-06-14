<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCustomerRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
      $method=$this->method();
      if($method=='PUT'){
    return [
          'name'=>['required','string'],
          'type'=>['required',Rule::in(['I','B'])],
          'email'=>['required','email'],
          'address'=>['required','string'],
          'city'=>['required','string'],
          'state'=>['required','string'],
          'postalCode'=>['required','string']
            ];
      }
      else{
        return [
           'name'=>['sometimes','required','string'],
          'type'=>['sometimes','required',Rule::in(['I','B'])],
          'email'=>['sometimes','required','email'],
          'address'=>['sometimes','required','string'],
          'city'=>['sometimes','required','string'],
          'state'=>['sometimes','required','string'],
          'postalCode'=>['sometimes','required','string']
            
        ];
      }
            }
    protected function prepareforvalidation(){
      if($this->postalCode){
        $this->merge([
          'postal_code'=>$this->postalCode
        ]);
      }
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreInvoiceRequest extends FormRequest
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
        return [
            //
          '*.customerId'=>['required','integer'],
          '*.amount'=>['required','integer'],
          '*.status'=>['required',Rule::in(['B','P','V'])],
          '*.billedDate'=>['required' ,'date','date_format:Y-m-d H:i:s'],
          '*.paidDate'=>['nullable','date','date_format:Y-m-d H:i:s']
        ];
    }
    protected function prepareforvalidation(){
      $data=[];

      foreach ($this->toArray() as $obj) {
        # code...
        $obj['customer_id']=$obj['customerId'];
        $obj['billed_date']=$obj['billedDate'];
        $obj['paid_date']=$obj['paidDate'];

        $data[]=$obj;
      }
      $this->merge($data);
    } 
}

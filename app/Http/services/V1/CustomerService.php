<?php
namespace App\Http\services\V1;

use App\Http\services\ApiService;

class CustomerService extends ApiService{

  protected $safeParams=[
    'name'=>['et'],
    'type'=>['et'],
    'email'=>['et'],
    'address'=>['et'],
    'city'=>['et'],
    'state'=>['et'],
    'postalCode'=>['et','lt','gt']
    
  ];
  protected $operatorMap=[
    'et'=>'=',
    'lt'=>'<',
    'gt'=>'>'
  ];
  protected $columnMap=[
    'postalCode'=>'postal_code'
  ];
}

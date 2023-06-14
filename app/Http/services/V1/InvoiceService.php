<?php

namespace App/Http/services/V1;
use App/Http/services/ApiService;

class InvoiceService extends ApiService{

  protected $safeParams=[
    'customer_id'=>['et'],
    'amount'=>['et','lt','gt'],
    'status'=>['et'],
    'billedDate'=>['et','lt','gt'],
    'paidDate'=>['et','lt','gt'],
  ];
  protected $operatorMap=[
    'et'=>'=',
    'lt'=>'<',
    'gt'=>'>'
  ];
  protected $columnMap=[
    'billedDate'=>'billed_date',
    'paidDate'=>'paid_date'
  ];
}

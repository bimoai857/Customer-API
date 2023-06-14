<?php

namespace App\Http\services;

use Illuminate\Http\Request;

class ApiService{

  protected $safeParams=[
    ];
  protected $operatorMap=[
    ];
  protected $columnMap=[
    ];
  public function transform(Request $request){
    $eloQuery=[];

    foreach ($this->safeParams as $params => $operators) {
      # code...
      $query=$request->query($params);
      if(!isset($query)){
        continue;
      }
      $column=$this->columnMap[$params]??$params;

      foreach ($operators as $operator) {
        # code...
        if(isset($query[$operator])){
            $eloQuery[]=[$column,$this->operatorMap[$operator],$query[$operator]];
        }
      }
      
    }

    return $eloQuery;
  }

}

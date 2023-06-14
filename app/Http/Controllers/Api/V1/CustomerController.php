<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Http\Requests\StoreCustomerRequest;
use App\Http\Requests\UpdateCustomerRequest;
use App\Http\Resources\V1\CustomerResource;
use App\Http\Resources\V1\CustomerCollection;
use Illuminate\Http\Request;
use App\Http\services\V1\CustomerService;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      //transform this $request(associative array of input params
      //['name'=>['eq'=>'Bimochan'],'age'=>['eq'=>25]
      //] )
      //to this format [['name','=','Bimochan'],['age','=',25]]
      //
      $service=new CustomerService();
      $filterItems=$service->transform($request);
      $query=Customer::where($filterItems);

      if($request->query('includeInvoice')){
        $customers=$query->with('invoices');
      }

      return new CustomerCollection($query->paginate());

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCustomerRequest $request)
    {
      return new CustomerResource(Customer::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request,Customer $customer)
    {
        //
      if($request->query('includeInvoice')){
        return new CustomerResource($customer->loadMissing('invoices'));
      }
      return new CustomerResource($customer);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCustomerRequest $request, Customer $customer)
    {
        //
      $customer->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
      $customer->delete();
    }
}

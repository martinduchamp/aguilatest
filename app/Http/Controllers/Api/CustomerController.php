<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = CustomerResource::collection(Customer::all());
        return $owners;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CustomerRequest $request)
    {
       //return $request;
    $customer = new Customer();
    $customer->name = $request->name;
    $customer->address = $request->address;
    $customer->postal_code = $request->postal_code;
    $customer->state = $request->state;
    $customer->city = $request->city;
    $customer->country = $request->country;
    $customer->area = $request->area;
    $customer->rfc = $request->rfc;
    $customer->currency = $request->currency;
    $customer->bank_account = $request->bank_account;
    $customer->tax_regime = $request->tax_regime;
    $customer->payment_type = $request->payment_type;
    $customer->withholding = $request->withholding;
    $customer->iva_rate = $request->iva_rate;
    $customer->ledger_account = $request->ledger_account;
    $customer->interior_number = $request->interior_number;
    $customer->exterior_number = $request->exterior_number;
    $customer->save();
    // $customer = Customer::created($request->validated());
        return new CustomerResource($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return new CustomerResource($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CustomerRequest $request, Customer $customer)
    {
        $customer->update($request->validated());
        return new CustomerResource($customer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgreementsFeeRequest;
use App\Http\Resources\AgreementFeeResource;
use App\Models\Agreement;
use App\Models\AgreementFee;
use Illuminate\Http\Request;

class AgreementsFeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agreementsFees = AgreementFeeResource::collection(AgreementFee::all());
        return $agreementsFees;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgreementsFeeRequest $request)
    {
        $agreement_fee = AgreementFee::create($request->validated());   
        return new AgreementFeeResource($agreement_fee);
    }

    /**
     * Display the specified resource.
     */
    public function show(AgreementFee $agreement_fee)
    {
        return new AgreementFeeResource($agreement_fee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgreementsFeeRequest $request, AgreementFee $agreement_fee)
    {
        $agreement_fee->update($request->validated());
        return new AgreementFeeResource($agreement_fee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AgreementFee $agreement_fee)
    {
        $agreement_fee->delete();
        return response()->noContent();
    }
}

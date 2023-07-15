<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgreementRequest;
use App\Http\Resources\AgreementResource;
use App\Models\Agreement;
use App\Models\AgreementFee;
use Illuminate\Http\Request;

class AgreementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fences = AgreementResource::collection(Agreement::all());
        return $fences;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AgreementRequest $request)
    {
        //return $request;
        $agreement = Agreement::create($request->validated());  
        
        $fees = $request->agreementfees;
        $feeid = [];
        foreach ($fees as &$value) {
            $feeid[] = [
                'agreement_id' => $agreement->id,
                'fee_id' => $value['fee']['id'],
                'amount' => $value['ammount'],
                'retention' => $value['retention']
            ];
        }

        AgreementFee::insert($feeid);

        return new AgreementResource($agreement);
    }

    /**
     * Display the specified resource.
     */
    public function show(Agreement $agreement)
    {
        return new AgreementResource($agreement);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AgreementRequest $request, Agreement $agreement)
    {
        $agreement->update($request->validated());
        
        $fees = $request->fees;
        $feeid = [];
        foreach ($fees as &$value) {
            $feeid[] = [
                'agreement_id' => $agreement->id,
                'fee_id' => $value['fee'],
                'amount' => $value['amount'],
                'retention' => $value['retention']
            ];
        }

        $agreement->fees()->sync($feeid);

        return new AgreementResource($agreement);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Agreement $agreement)
    {
        $agreement->delete();
        return response()->noContent();
    }
}

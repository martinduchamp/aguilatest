<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\AgreementRequest;
use App\Http\Resources\AgreementResource;
use App\Models\Agreement;
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
        $agreement = Agreement::create($request->validated());   
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

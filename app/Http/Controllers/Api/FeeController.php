<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FeeRequest;
use App\Http\Resources\FeeResource;
use App\Models\Fee;
use Illuminate\Http\Request;

class FeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fees = FeeResource::collection(Fee::all());
        return $fees;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FeeRequest $request)
    {
        $fee = Fee::create($request->validated());   
        return new FeeResource($fee);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fee $fee)
    {
        return new FeeResource($fee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FeeRequest $request, Fee $fee)
    {
        $fee->update($request->validated());
        return new FeeResource($fee);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fee $fee)
    {
        $fee->delete();
        return response()->noContent();
    }
}

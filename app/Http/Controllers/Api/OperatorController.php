<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OperatorRequest;
use App\Http\Resources\OperatorResource;
use App\Models\Operator;
use Illuminate\Http\Request;

class OperatorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fences = OperatorResource::collection(Operator::all());
        return $fences;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OperatorRequest $request)
    {
        $fence = Operator::create($request->validated());   
        return new OperatorResource($fence);
    }

    /**
     * Display the specified resource.
     */
    public function show(Operator $fence)
    {
        return new OperatorResource($fence);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OperatorRequest $request, Operator $fence)
    {
        $fence->update($request->validated());
        return new OperatorResource($fence);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Operator $fence)
    {
        $fence->delete();
        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\VehicleRequest;
use App\Http\Resources\VehicleResource;
use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fences = VehicleResource::collection(Vehicle::all());
        return $fences;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehicleRequest $request)
    {
        $fence = Vehicle::create($request->validated());   
        return new VehicleResource($fence);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehicle $fence)
    {
        return new VehicleResource($fence);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehicleRequest $request, Vehicle $fence)
    {
        $fence->update($request->validated());
        return new VehicleResource($fence);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vehicle $fence)
    {
        $fence->delete();
        return response()->noContent();
    }
}

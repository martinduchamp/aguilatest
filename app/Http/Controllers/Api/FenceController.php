<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\FenceRequest;
use App\Http\Resources\FenceResource;
use App\Models\Fence;
use Illuminate\Http\Request;

class FenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fences = FenceResource::collection(Fence::all());
        return $fences;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FenceRequest $request)
    {
        $fence = Fence::create($request->validated());   
        return new FenceResource($fence);
    }

    /**
     * Display the specified resource.
     */
    public function show(Fence $fence)
    {
        return new FenceResource($fence);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(FenceRequest $request, Fence $fence)
    {
        $fence->update($request->validated());
        return new FenceResource($fence);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Fence $fence)
    {
        $fence->delete();
        return response()->noContent();
    }
}

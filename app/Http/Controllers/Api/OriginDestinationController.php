<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OriginDestinationRequest;
use App\Http\Resources\OriginDestinationResource;
use App\Models\OriginDestination;
use Illuminate\Http\Request;

class OriginDestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = OriginDestinationResource::collection(OriginDestination::all());
        return $owners;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OriginDestinationRequest $request)
    {
        $originDestination = OriginDestination::create($request->validated());   
        return new OriginDestinationResource($originDestination);
    }

    /**
     * Display the specified resource.
     */
    public function show(OriginDestination $originDestination)
    {
        return new OriginDestinationResource($originDestination);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OriginDestinationRequest $request, OriginDestination $originDestination)
    {
        $originDestination->update($request->validated());
        return new OriginDestinationResource($originDestination);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OriginDestination $originDestination)
    {
        $originDestination->delete();
        return response()->noContent();
    }
}

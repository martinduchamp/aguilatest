<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrailerRequest;
use App\Http\Resources\TrailerResource;
use App\Models\Trailer;
use Illuminate\Http\Request;

class TrailerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trailers = TrailerResource::collection(Trailer::all());
        return $trailers;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrailerRequest $request)
    {
        $trailer = Trailer::create($request->validated()); 
        return new TrailerResource($trailer);
    }

    /**
     * Display the specified resource.
     */
    public function show(trailer $trailer)
    {
        return new TrailerResource($trailer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TrailerRequest $request, trailer $trailer)
    {
        
        $trailer->update($request->validated());
        return new TrailerResource($trailer);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trailer $trailer)
    {
        $trailer->delete();
        return response()->noContent();
    }
}

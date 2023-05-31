<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\ValidityConceptRequest;
use App\Http\Resources\ValidityConceptResource;
use App\Models\ValidityConcept;
use Illuminate\Http\Request;

class ValidityConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $valifityConcepts = ValidityConceptResource::collection(ValidityConcept::all());
        return $valifityConcepts;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ValidityConceptRequest $request)
    {
        $validityConcept = ValidityConcept::create($request->validated());   
        return new ValidityConceptResource($validityConcept);
    }

    /**
     * Display the specified resource.
     */
    public function show(ValidityConcept $validityConcept)
    {
        return new ValidityConceptResource($validityConcept);   
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ValidityConceptRequest $request, ValidityConcept $validityConcept)
    {
        $validityConcept->update($request->validated());
        return new ValidityConceptResource($validityConcept);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ValidityConcept $validityConcept)
    {
        $validityConcept->delete();
        return response()->noContent();
    }
}

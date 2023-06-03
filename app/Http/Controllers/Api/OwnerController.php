<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\OwnerRequest;
use App\Http\Resources\OwnerResource;
use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $owners = OwnerResource::collection(Owner::all());
        return $owners;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(OwnerRequest $request)
    {
        $owner = Owner::create($request->validated());
        $owner->trailers()->attach($request->trailers);
        return new OwnerResource($owner);
    }

    /**
     * Display the specified resource.
     */
    public function show(Owner $owner)
    {
        return new OwnerResource($owner);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(OwnerRequest $request, owner $owner)
    {

        $owner->name =  $request->owner['name'];
        $owner->trailers()->sync($request->trailers);
        $owner->save();
        return new OwnerResource($owner);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(owner $owner)
    {
        $owner->delete();
        return response()->noContent();
    }
}

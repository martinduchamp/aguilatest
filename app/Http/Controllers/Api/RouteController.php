<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\RouteRequest;
use App\Http\Resources\RouteResource;
use App\Models\Route;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $routes = RouteResource::collection(Route::all());
        return $routes;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(RouteRequest $request)
    {
        $route = Route::create($request->validated());   
        return new RouteResource($route);
    }

    /**
     * Display the specified resource.
     */
    public function show(Route $route)
    {
        return new RouteResource($route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(RouteRequest $request, Route $route)
    {
        $route->update($request->validated());
        return new RouteResource($route);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Route $route)
    {
        $route->delete();
        return response()->noContent();
    }
}

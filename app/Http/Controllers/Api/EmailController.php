<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\EmailRequest;
use App\Http\Resources\EmailResource;
use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $email = EmailResource::collection(Email::all());
        return $email;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmailRequest $request)
    {
        $originDestination = Email::create($request->validated());   
        return new EmailResource($originDestination);
    }

    /**
     * Display the specified resource.
     */
    public function show(Email $originDestination)
    {
        return new EmailResource($originDestination);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmailRequest $request, Email $email)
    {
        $email->update($request->validated());
        return new EmailResource($email);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Email $email)
    {
        $email->delete();
        return response()->noContent();
    }
}

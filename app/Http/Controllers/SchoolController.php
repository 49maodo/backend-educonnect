<?php

namespace App\Http\Controllers;

use App\Http\Requests\SchoolRequest;
use App\Http\Resources\SchoolResource;
use App\Models\School;

class SchoolController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', School::class);

        $schools = School::all();
        $schools->load('Diplomas');

        return SchoolResource::collection($schools);
    }

    public function store(SchoolRequest $request)
    {
        $this->authorize('create', School::class);

        $school = School::create($request->validated());
        $school->load('Diplomas');

        return new SchoolResource($school);
    }

    public function show(School $school)
    {
        $this->authorize('view', $school);

//        return $school;
        return new SchoolResource($school->load('Diplomas'));
    }

    public function update(SchoolRequest $request, School $school)
    {
        $this->authorize('update', $school);

        $school->update($request->validated());
        $school->load('Diplomas');

        return new SchoolResource($school);
    }

    public function destroy(School $school)
    {
        $this->authorize('delete', $school);

        $school->delete();

        return response()->json();
    }
}

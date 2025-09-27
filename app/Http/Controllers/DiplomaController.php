<?php

namespace App\Http\Controllers;

use App\Http\Requests\DiplomaRequest;
use App\Http\Resources\DiplomaResource;
use App\Models\Diploma;

class DiplomaController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Diploma::class);

        return DiplomaResource::collection(Diploma::all()->load('school'));
    }

    public function store(DiplomaRequest $request)
    {
        $this->authorize('create', Diploma::class);
        $data = $request->validated();
        $data['user_id'] = auth()->id();

        $diploma = Diploma::create($data);
        $diploma->load('school');
        return new DiplomaResource($diploma);
    }

    public function show(Diploma $diploma)
    {
        $this->authorize('view', $diploma);

        return new DiplomaResource($diploma->load('school'));
    }

    public function update(DiplomaRequest $request, Diploma $diploma)
    {
        $this->authorize('update', $diploma);

        $diploma->update($request->validated());
        $diploma->load('school');

        return new DiplomaResource($diploma);
    }

    public function destroy(Diploma $diploma)
    {
        $this->authorize('delete', $diploma);

        $diploma->delete();

        return response()->json();
    }
}

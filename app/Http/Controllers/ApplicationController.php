<?php

namespace App\Http\Controllers;

use App\Http\Requests\ApplicationRequest;
use App\Http\Requests\ApplicationUpadteRequest;
use App\Http\Resources\ApplicationResource;
use App\Models\Application;

class ApplicationController extends Controller
{
    public function index()
    {
        $this->authorize('viewAny', Application::class);

        $applications = Application::all();
        $applications->load('user', 'diploma','diploma.school');
        return ApplicationResource::collection($applications);
    }

    public function store(ApplicationRequest $request)
    {
        $this->authorize('create', Application::class);
        $data = $request->validated();
        $data['user_id'] = auth()->id();
        $application = Application::create($data);
        $application->load('user', 'diploma', 'diploma.school');
        return new ApplicationResource($application);
    }

    public function show(Application $application)
    {
        $this->authorize('view', $application);

        return new ApplicationResource($application->load('user', 'diploma','diploma.school'));
    }

//    public function update(ApplicationUpadteRequest $request, Application $application)
//    {
//        $this->authorize('update', $application);
//
//        $application->update($request->validated());
//
//        return new ApplicationResource($application->load('user', 'diploma','diploma.school'));
//    }

    public function destroy(Application $application)
    {
        $this->authorize('delete', $application);

        $application->delete();

        return response()->json();
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
    {
        return auth()->user()->jobs;
    }

    public function show($id)
    {
        $job = auth()->user()->jobs()->find($id);

        if ($job) {
            return response()->json($job);
        }

        return response()->json([
            'message' => 'Job not found.',
        ], 400);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
        ]);

        $job = auth()->user()->jobs()->create($request->all());

        if ($job) {
            return response()->json($job);
        }

        return response()->json([
            'message' => 'Job not added',
        ], 500);
    }

    public function update(Request $request, $id)
    {
        $job = auth()->user()->jobs()->find($id);

        if (!$job) {
            return response()->json([
                'message' => 'Job not found',
            ], 400);
        }

        $updated = $job->fill($request->all())->save();

        if ($updated) {
            return response()->json($job);
        }

        return response()->json([
            'message' => 'Job can not be updated',
        ], 500);
    }

    public function destroy($id)
    {
        $job = auth()->user()->jobs()->find($id);

        if (!$job) {
            return response()->json([
                'message' => 'Job not found',
            ], 400);
        }

        if ($job->delete()) {
            return response()->json([
                'message' => 'Job deleted',
            ], 200);
        }

        return response()->json([
            'message' => 'Job can not be deleted',
        ], 500);
    }
}

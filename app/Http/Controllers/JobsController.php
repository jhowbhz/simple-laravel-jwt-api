<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendJobsRequest;
use App\Models\User;
use App\Jobs\JobExample;
use Illuminate\Http\Request;

class JobsController extends Controller
{
    public function send(SendJobsRequest $request)
    {
        $user = User::where('email', $request->validated()['email'])->first();

        if (!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        JobExample::dispatch($user);

        return response()->json(['message' => 'Job dispatched']);
    }
}

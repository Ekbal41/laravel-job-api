<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    //api route to get all jobs
    public function index()
    {
        return (new JobCollection(Job::paginate(10)))->response();
    }
    
    //api route to get a single job
    public function show(Job $job)
    {
        return (new JobResource($job))->response();
    }

}

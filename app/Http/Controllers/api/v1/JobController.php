<?php

namespace App\Http\Controllers\api\v1;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Http\Resources\JobCollection;
use App\Http\Resources\JobResource;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class JobController extends Controller
{
    //api route to get all jobs
    public function index()
    {
        return (new JobCollection(Job::paginate(10)))->response();
    }

    //api route to get a single job
    public function show($id)
    {
        //if there is no job with this id
        $job = Job::find($id);
        if (!$job) {
            //if there is no job with this id return
            return response()->json(['error' => 'Job Not Found'], 404);
        }
        return (new JobResource($job))->response();
    }

    //api route to create a new job
    public function store(Request $request)
    {
        //check if request method is post or not
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valideate data
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'location' => 'required',
                'salary' => 'required',
                'description' => 'required',
                'time' => 'required',
                'category' => 'required',
            ];
            $customMessages = [
                'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($data, $rules, $customMessages);
            //create new job
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $job = Job::create($request->all());
            return (new JobResource($job))->response();
        }
    }

    //api route to update a job
    public function update(Request $request, Job $job)
    {
        //check if request method is post or not
        if ($request->isMethod('post')) {
            $data = $request->all();
            //valideate data
            $rules = [
                'title' => 'required',
                'description' => 'required',
                'location' => 'required',
                'salary' => 'required',
                'description' => 'required',
                'time' => 'required',
                'category' => 'required',
            ];
            $customMessages = [
                'required' => 'The :attribute field is required.',
            ];
            $validator = Validator::make($data, $rules, $customMessages);
            //create new job
            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()], 401);
            }
            $job->update($request->all());
            return (new JobResource($job))->response();
        }
    }

    //api route to delete a job
    public function destroy(Request $request, Job $job)
    {
        //check if request method is post or not
        if ($request->isMethod('post')) {
            $job->delete();
            return response()->json(['message' => 'Job Deleted Successfully'], 200);
        }
    }
}

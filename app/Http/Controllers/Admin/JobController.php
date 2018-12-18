<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        $jobs =Job::all();
        return view('admin.jobs.index',compact('jobs'));
    }

    public function create()
    {
        return view('admin.jobs.create-edit');
    }
    public function edit(Job $job)
    {
        return view('admin.jobs.create-edit',compact('job'));
    }
    public function store(JobRequest $request)
    {
        $job = new Job();
        $job->code = $request->get('code');
        foreach (\Localization::getSupportedLocales() as $key => $values)
        {
            if ($request->get('title_'. $key))
            {
                $job->translateOrNew($key)->title=$request->get('title_'.$key);
            }
            if ($request->get('name_'. $key))
            {
                $job->translateOrNew($key)->name=$request->get('name_'.$key);
            }
            if ($request->get('description_'. $key))
            {
                $job->translateOrNew($key)->description=$request->get('description_'.$key);
            }


        }
        $job->save();
        return redirect(action('Admin\JobController@index'))->with('success','Job Created Successfully');
    }

    public function update(JobRequest $request, Job $job)
    {
        $job->code = $request->get('code');
        foreach (\Localization::getSupportedLocales() as $key => $values)
        {
            if ($request->get('title_'. $key))
            {
                $job->translateOrNew($key)->title=$request->get('title_'.$key);
            }
            if ($request->get('name_'. $key))
            {
                $job->translateOrNew($key)->name=$request->get('name_'.$key);
            }
            if ($request->get('description_'. $key))
            {
                $job->translateOrNew($key)->description=$request->get('description_'.$key);
            }
        }
        $job->save();
        return redirect(action('Admin\JobController@index'))->with('success','Job Updated Successfully');
    }
    public function destroy(Job $job)
    {
        $job->delete();
        return redirect(action('Admin\JobController@index'))->with('success','Job Removed Successfully');

    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Models\JobRqt;
use App\Http\Controllers\Controller;

class JobRqtsController extends Controller
{
    public function index()
    {
        $request = JobRqt::all();
        return view('admin.jobs.request',compact('request'));
    }
    public function show(JobRqt $request)
    {
        return view('admin.jobs.show',compact('request'));
    }
    public function destroy(JobRqt $request)
    {
        if (file_exists(storage_path($request->pdf_file))) {
            unlink(storage_path($request->pdf_file));
        }
        $request->delete();
        return back()->with('success', 'Request Deleted!');
    }
}

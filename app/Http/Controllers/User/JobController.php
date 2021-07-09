<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\storeJobRequest;
use App\Models\JobPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index()
    {
        $data['data'] = JobPost::where('user_id', Auth::id())->paginate(10);
        return view('user.pages.jobs.list', $data);
    }
    public function addJob(Request $request)
    {
        $data = [];
        if($request->id){
            $data['data'] = JobPost::where('id',$request->id)->first();
        }
        return view('user.pages.jobs.add',$data);
    }
    public function postJob(storeJobRequest $request)
    {
        JobPost::saveJob($request);
        return redirect()->route('user.jobs')->with('success', 'Job has been created');
    }
    public function deleteJob(Request $request)
    {
        if($request->id)
        JobPost::where('id',$request->id)->delete();
        return redirect()->route('user.jobs')->with('success', 'Job has been deleted');
    }
}

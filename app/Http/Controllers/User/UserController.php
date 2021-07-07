<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\user\profile\UpdateRequest;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $profile=Auth::guard('web')->user()->profile;
        return view('user.pages.profiles.update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request)
    {
            $file_name="";
            $oldImage = public_path('storage/'.Auth::user()->profile->profile_img);
            File::delete($oldImage);
            if($request->file('profile_img')){
                $img_uploaded=$request->file('profile_img')->store('public');
                $file_name=$request->file('profile_img')->hashName();
            }
             $profile_updated=Profile::updateOrCreate(
                    ['user_id'=>Auth::user()->id],
                    [
                        'user_id'=>Auth::user()->id, 
                        'profile_img'=>$file_name,
                        'address'=>$request->address,
                        'city'=>$request->city,
                        'state'=>$request->state,
                        'zipcode'=>$request->zip_code,
                        'country'=>$request->country,
                        'phone_number'=>$request->phone,
                        'gender'=>$request->gender
                    ]
                );
                if($profile_updated){
                    return redirect()->route('home.profile.update')->with('success','Profile Updated Successfully');
                }else{
                    return redirect()->route('home.profile.update')->with('error','Some error occure! Plz contact with developer.');
                }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

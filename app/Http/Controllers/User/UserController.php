<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\user\profile\ChangePassword;
use App\Http\Requests\user\profile\UpdateProfileRequest;

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
    public function show()
    {
        return view('user.pages.profiles.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        // dd(Auth::user()->hasVerifiedEmail());
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
    public function update(UpdateProfileRequest $request)
    {
            $file_name=isset(Auth::user()->profile->profile_img)?Auth::user()->profile->profile_img:NULL;
            if(isset(Auth::user()->profile->profile_img)){
                if(($request->file('profile_img'))){
                $oldImage = public_path('storage/'.Auth::user()->profile->profile_img);
                File::delete($oldImage);
                }
            }
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
                User::find(Auth::id())->update(['name'=>$request->name]);
                if($profile_updated){
                    return redirect()->route('home.profile.update')->with('success','Profile Updated Successfully');
                }else{
                    return redirect()->route('home.profile.update')->with('error','Some error occure! Plz contact with developer.');
                }
    }
    public function changePassword()
    {
        // dd(session());
        return view('user.pages.profiles.change-password');
    }
    public function updatePassword(ChangePassword $request)
    {
        
        // dd($request);
        $hashed_password=Hash::make($request->password);
        session()->put('password_hash_web',$hashed_password);
        // return redirect()->route('home.change_password')->with('success','Password Changed Successfully');
        // dd(session());
        $changedPassword=User::find(Auth::id())->update(['password'=>$hashed_password]);
        if($changedPassword){
            return redirect()->route('home.change_password')->with('success','Password Changed Successfully');
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

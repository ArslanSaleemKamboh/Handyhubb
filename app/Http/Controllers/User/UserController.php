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
        $data['profile']=Auth::User(); 
        return view('user.pages.profiles.index',$data);
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
         $data_to_update = $request->validated();
            if($request->file('profile_img')){
                $oldImage = public_path('storage/'.Auth::user()->profile_img);
                File::delete($oldImage);

                $img_uploaded=$request->file('profile_img')->store('public');
                $data_to_update['profile_img'] = $request->file('profile_img')->hashName();
                
            }
            User::where('id',Auth::id())->update($data_to_update); 
            return redirect()->route('user.profile')->with('success','Profile Updated Successfully');
                 
    }
    public function changePassword()
    { 
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

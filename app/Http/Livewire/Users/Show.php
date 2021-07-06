<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Show extends Component
{ 
    public $title;
    public $state=[];
    public $isEdit=false;
    public $user;
    public $user_id;
    public function createUser()
    {
        $this->isEdit=false;
        $this->dispatchBrowserEvent('show-model');
        $this->state=[];

       
    }
    public function editUser(User $user)
    {
        $this->isEdit=true;
        $this->state= $user->toArray();
        $this->user= $user;
        $this->dispatchBrowserEvent('show-model');
        
    }
    public function saveUser()
    {
        $validatedData=Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'phone'=>'required|integer',
            'password'=>'required|confirmed',
        ])->validate();
        $validatedData['password']=bcrypt($validatedData['password']);
        User::create($validatedData);
        $this->dispatchBrowserEvent('hide-model',['message'=>'User Created Successfully!']);
        return redirect()->back();
    }
    public function saveUserChanges()
    {
        $validatedData=Validator::make($this->state,[
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|integer',
            'password'=>'required|confirmed',
        ])->validate();
        $validatedData['password']=bcrypt($validatedData['password']);
        $this->user->update($validatedData);
        $this->dispatchBrowserEvent('hide-model',['message'=>'User Updated Successfully!']);
        return redirect()->back();
    }
    public function confirmUserRemoval($id)
    {
        $this->user_id=$id;
        $this->dispatchBrowserEvent('show-delete-model');
    }
    public function deleteUser()
    {
        $user=User::findOrFail($this->user_id);
        $user->delete();
        $this->dispatchBrowserEvent('hide-delete-model',['message'=>'User Deleted Successfully!']);
        
    }
    public function render()
    {
        $users=User::orderBy('id','desc')->get();
        return view('livewire.users.show',[
            'users'=>$users
        ]);
    }
}
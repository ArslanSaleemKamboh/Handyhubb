<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobPost extends Model
{
    use HasFactory;
    protected $guarded = [];
    public static function saveJob($request){ 
        $data_to_save = $request->validated();
        $data_to_save['user_id'] = Auth::id(); 
        JobPost::create($data_to_save);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class JobPost extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getCategory(){
        return $this->hasMany(JobPostCategory::class,'job_post_id','id');
    }
    public function getImages(){
        return $this->hasMany(JobGallery::class,'job_id','id');
    }
    public static function saveJob($request)
    {
        $data_to_save = $request->validated(); 
        $data_to_save['user_id'] = Auth::id();
        unset($data_to_save['filename']);
        unset($data_to_save['category']);
        $edit_id = $data_to_save['edit_id'];

        unset($data_to_save['edit_id']);
        if(isset($edit_id) && $edit_id != ''){
            
            $obj = JobPost::where('id',$edit_id)->update($data_to_save);
            $id = $edit_id;
        } else { 
            $obj = JobPost::create($data_to_save);
            $id = $obj->id;
        }
       
        if ($request->hasfile('filename')) {
            JobGallery::where('job_id', $id)->delete();
            foreach ($request->file('filename') as $image) {
                $name = time() . $image->getClientOriginalName();
                $file_name = '/job_images/'. $name;
                $image->move(public_path() . '/job_images/', $name);
                JobGallery::create(['job_id' => $id, 'image' => $file_name]);
            }
        }
        if ($request->category) {
            JobPostCategory::where('job_post_id', $id)->delete();
            foreach ($request->category as $cat) { 
                JobPostCategory::create(['job_post_id' => $id, 'category_id' => $cat]);
            }
        }
    }
}

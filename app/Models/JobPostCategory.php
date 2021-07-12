<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPostCategory extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function getName(){
        return $this->hasOne(Category::class,'id','category_id');
    }
}

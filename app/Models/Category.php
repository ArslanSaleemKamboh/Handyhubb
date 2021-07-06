<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'title',
        'parent_id',
        'status',
        'search_count',
        'in_header'
    ];
    protected $hidden = [
        'created_at',
        'updated_at'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'profile_img',
        'address',
        'city',
        'state',
        'zipcode',
        'country',
        'phone_number',
        'gender',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }
    
    public function wathchistory()
    {
        return $this->hasMany(WatchHistory::class,'course_id');
    }

}

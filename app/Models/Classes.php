<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class,'created_by');
    }

    public function watchHistory()
    {
        return $this->hasMany(WatchHistory::class ,'class_id');
    }
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    use HasFactory;

    protected $fillable = ['activity_id', 'user_id', 'action', 'remark'];

    // Relationship with Activity
    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }

    // Relationship with User
        public function user()
    {
        return $this->belongsTo(User::class);
    }

}

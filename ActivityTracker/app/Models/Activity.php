<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'sms_count', 'log_sms_count', 'status', 'remark'];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with ActivityLog
        public function logs()
    {
        return $this->hasMany(ActivityLog::class, 'activity_id');
    }
}

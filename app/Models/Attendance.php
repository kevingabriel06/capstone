<?php

namespace App\Models;
use App\Models\User;
use App\Models\Activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['updated_at', 'created_at'];

    protected $fillable = ['student_id', 'activity_id', 'time_in', 'time_out'];

    protected $primaryKey = 'attendance_id';

    public function user()
    {
        return $this->belongsTo(User::class, 'student_id', 'student_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }
}

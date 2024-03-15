<?php

namespace App\Models;
use App\Models\User;
use App\Models\Activity;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['updated_at', 'created_at'];

    protected $fillable = ['student_id', 'activity_id', 'time_in', 'time_out'];

    public function users() {
        return $this->belongsTo(User::class);
    }

    public function activities() {
        return $this->belongsTo(Activity::class);
    }
}

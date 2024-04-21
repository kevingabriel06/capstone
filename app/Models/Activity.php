<?php

namespace App\Models;
use App\Models\Attendance;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    protected $fillable = [
        "activity_id",
        "title",
        "date_start",
        "date_end",
        "am_in",
        "am_out",
        "pm_in",
        "pm_out",
        "am_in_cut",
        "am_out_cut",
        "pm_in_cut",
        "pm_out_cut",
        "registration_deadline",
        "registration_fee",
        "department_id",
        "organization_id",
        "description",
        "image_path"
        
    ] ;

    protected $primaryKey = 'activity_id';

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'activity_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class);
    }
    
}

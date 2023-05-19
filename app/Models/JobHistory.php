<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employmentStatus()
    {
        return $this->belongsTo(EmploymentStatus::class, 'employment_status_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function designation()
    {
        return $this->belongsTo(Designation::class, 'designation_id');
    }

    public function lastDesignation()
    {
        return $this->belongsTo(Designation::class, 'last_designation_id');
    }
    public function salary()
    {
        return $this->hasOne(SalaryHistory::class, 'job_history_id', 'id');
    }
}

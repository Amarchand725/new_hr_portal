<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function userEmploymentStatus()
    {
        return $this->hasOne(UserEmploymentStatus::class, 'id', 'employment_status_id')->where('end_date', null);
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

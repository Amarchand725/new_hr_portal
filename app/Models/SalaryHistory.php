<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryHistory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function jobHistory()
    {
        return $this->belongsTo(JobHistory::class, 'job_history_id');
    }
}

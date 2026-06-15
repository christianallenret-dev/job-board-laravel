<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'job_id',
        'applicant_name',
        'email',
        'degree',
        'university',
    ];

    public function job()
    {
        return $this->belongsTo(Job::class, 'job_id');
    }
}

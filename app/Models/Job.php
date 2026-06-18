<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $table = 'job_board';

    protected $fillable = [
        'title',
        'company',
        'location',
        'salary',
        'type',
        'description',
    ];

    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
}

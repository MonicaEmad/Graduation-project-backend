<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

#[fillable(['job_seeker_profile_id', 'type'])]
class Disability extends Model
{
        use HasFactory, Notifiable, HasUuids;

            public $incrementing = false;
    protected $keyType = 'string';

    public function jobSeekerProfile()
    {
        return $this->belongsTo(JobSeekerProfile::class);
    }
}

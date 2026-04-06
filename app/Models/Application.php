<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use App\Enums\ApplicationStatus;


#[Fillable(['status', 'resume_id', 'job_vacancy_id', 'user_id'])]
class Application extends Model
{
    use HasUuids, HasFactory, Notifiable;

    public $incrementing = false;
    protected $keyType = 'string';

    public function job()
    {
        return $this->belongsTo(JobVacancy::class, 'job_vacancy_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function resume()
    {
        return $this->belongsTo(Resume::class);
    }

    protected $casts = [
        'status' => ApplicationStatus::class,
    ];
}

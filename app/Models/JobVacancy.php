<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use App\Enums\JobStatus;

#[Fillable([ 'status', 'description', 'experience_years_required', 'approved_disability', 'job_category_id', 'company_id'])]
class JobVacancy extends Model
{
    use HasUuids,HasFactory, Notifiable;

        public $incrementing = false;
    protected $keyType = 'string';
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function applications()
    {
        return $this->hasMany(Application::class, 'job_vacancy_id');
    }

    public function jobCategory()
    {
        return $this->belongsTo(JobCategory::class);
    }

    public function skills()
{
    return $this->belongsToMany(Skill::class, 'skills_required', 'job_vacancy_id', 'skill_id');
}

    protected $casts = [
        'status' => JobStatus::class,
    ];
}

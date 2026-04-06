<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name'])]
class Skill extends Model
{
    use HasFactory, Notifiable,HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';

    public function jobs()
    {
        return $this->belongsToMany(JobVacancy::class, 'skills_required', 'skill_id', 'job_vacancy_id');
    }


    public function users()
    {
        return $this->belongsToMany(User::class, 'skills_possesses', 'skill_id', 'user_id');
    }
}

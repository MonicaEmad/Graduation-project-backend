<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

#[Fillable(['user_id', 'skill_id'])]
class SkillsPossess extends Model
{
        use HasFactory, Notifiable,HasUuids;
    public $incrementing = false;
    protected $keyType = 'string';
    protected $table = 'skills_possesses';
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable(['user_id','summary','availability_status' ,'title', 'work_environment','portfolio_link'])]
class JobSeekerProfile extends Model
{
            use HasFactory, Notifiable,HasUuids;

                public $incrementing = false;
    protected $keyType = 'string';
  public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function disabilities()
    {
        return $this->hasMany(Disability::class);
    }
}

<?php

namespace App\Models;


use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Enums\UserStatus;
use App\Enums\UserRole;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;

#[Fillable(['f_name', 'l_name', 'gender','email','gender','street','city',
'google_id', 'facebook_id','password', 'status', 'personal_photo', 'role','email_verified_at',])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable,HasUuids,HasApiTokens;

        public $incrementing = false;
    protected $keyType = 'string';


    public function jobSeekerProfile()
    {
        return $this->hasOne(JobSeekerProfile::class);
    }

    public function phones()
    {
        return $this->hasMany(UserPhone::class);
    }

       public function resume()
    {
        return $this->hasOne(Resume::class);
    }

        public function applications()
    {
        return $this->hasMany(Application::class);
    }

        public function skills()
    {
        return $this->belongsToMany(Skill::class, 'skills_possesses', 'user_id', 'skill_id');
    }

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }

    public function education()
    {
        return $this->hasMany(Education::class);
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class);
    }

    public function subscriptions()
    {
        return $this->hasMany(Subscription::class);
    }
    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'status' => UserStatus::class,
            'role' => UserRole::class,
        ];

    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;

#[Fillable(['name', 'description', 'website_link',
        'type', 'disability_support_policy', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class Company extends Authenticatable
{
    use HasFactory, Notifiable,HasUuids,HasApiTokens;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = ['name', 'description', 'website_link', 'email', 'password', 'type', 'disability_support_policy'];



    public function jobs()
    {
        return $this->hasMany(JobVacancy::class);
    }
        public function locations()
    {
        return $this->hasMany(CompanyLocation::class);
    }


}

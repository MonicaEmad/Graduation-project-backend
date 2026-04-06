<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

#[Fillable(['company_id', 'location'])]
class CompanyLocation extends Model
{
    use HasUuids, HasFactory, Notifiable;

        public $incrementing = false;
    protected $keyType = 'string';
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

#[Fillable(['user_id', 'phone_number'])]
class UserPhone extends Model
{
    use HasFactory, Notifiable,HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';
        public function user()
    {
        return $this->belongsTo(User::class);
    }


}

<?php

namespace App\Models;

use App\Enums\SubscriptionStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Notifications\Notifiable;

#[Fillable([ 'start_date', 'end_date', 'status','plan_id','user_id'])]
class Subscription extends Model
{
    use HasFactory, Notifiable, HasUuids;

        public $incrementing = false;
    protected $keyType = 'string';


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    protected function casts(): array
    {
        return [
            'status' => SubscriptionStatus::class,
        ];
    }
}

<?php

namespace App\Enums;

enum ApplicationStatus:string
{
    case PENDING = 'pending';
    case REVIWED = 'reviewed';
    case ACCEPTED = 'accepted';
    case REJECTED = 'rejected';
}

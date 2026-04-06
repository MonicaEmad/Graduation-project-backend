<?php

namespace App\Enums;

enum AvailabiltyStatus:string

{
    case AVAILABLE = 'immediately';
    case AVAILABLE_IN_2_WEEKS = 'available_in_2_weeks';
    case NOT_AVAILABLE = 'not_available';
}

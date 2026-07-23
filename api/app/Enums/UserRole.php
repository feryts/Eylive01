<?php

namespace App\Enums;

enum UserRole:int
{
    case USER = 0;
    case BROADCASTER = 1;
    case AGENCY_OWNER = 2;
    case COIN_DEALER = 3;
    case MODERATOR = 4;
    case ADMIN = 5;
    case HEAD_ADMIN = 6;
    case SUPER_ADMIN = 7;
}

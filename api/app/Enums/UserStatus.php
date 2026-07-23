<?php

namespace App\Enums;

enum UserStatus:int
{
    case ACTIVE = 1;
    case SUSPENDED = 2;
    case BANNED = 3;
    case DELETED = 4;
}

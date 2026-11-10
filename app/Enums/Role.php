<?php

namespace App\Enums;

enum Role: string
{
    case USER = 'user';
    case EMPLOYEE = 'employee';
    case ADMIN = 'admin';
}
<?php

namespace App\Enums;

enum UserType: string
{
   case BANNED = 'banned';
   case USER = 'user';
   case CURATOR = 'curator';
   case ADMIN = 'admin';
}

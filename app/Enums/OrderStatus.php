<?php

namespace App\Enums;

enum OrderStatus: int
{
    case NEW = 1;
    case IN_PROGRESS = 2;
    case DONE = 3;
}
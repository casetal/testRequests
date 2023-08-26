<?php

namespace App\Enums;

// это для PHP 8.1

// enum RequestsEnum:string {
//     case Active = 'Active';
//     case Resolved = 'Resolved';
// }

abstract class RequestsEnum
{
    const Active = 'Active';
    const Resolved = 'Resolved';
}
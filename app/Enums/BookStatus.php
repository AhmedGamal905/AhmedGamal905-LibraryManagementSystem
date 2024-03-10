<?php
namespace App\Enums;

enum BookStatus: string
{
    case AVAILABLE = 'available';
    case UNAVAILABLE = 'unavailable';
}
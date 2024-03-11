<?php
namespace App\Enums;

enum BorrowStatus: string
{
    case RETURNED = 'returned';
    case INPROGRESS = 'inprogress';
}
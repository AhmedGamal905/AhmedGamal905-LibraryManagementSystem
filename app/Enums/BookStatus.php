<?php

namespace App\Enums;

enum BookStatus: string
{
    case AVAILABLE = 'available';

    case UNAVAILABLE = 'unavailable';

    public function label(): string
    {
        return ucfirst($this->value);
    }
}

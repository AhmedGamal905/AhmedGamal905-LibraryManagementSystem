<?php

namespace App\Enums;

enum BorrowStatus: string
{
    case RETURNED = 'returned';

    case INPROGRESS = 'inprogress';

    public function label(): string
    {
        return ucfirst($this->value);
    }

    public function classes(): string
    {
        return match ($this) {
            self::RETURNED => 'status-returned',
            self::INPROGRESS => 'status-inprogress',
        };
    }

    public function isInprogress(): bool
    {
        return $this == self::INPROGRESS;
    }
}

<?php

namespace App\Api_Laravel\User\Domain\ValueObject;

use InvalidArgumentException;

class UserId
{
    /**
     * @var int
     */
    private $value;

    public function __construct(int $id)
    {
        $this->value = $id;
    }

    public function value(): int
    {
        return $this->value;
    }
}

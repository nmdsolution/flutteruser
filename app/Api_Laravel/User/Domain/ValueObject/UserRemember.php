<?php


namespace App\Api_Laravel\User\Domain\ValueObject;


class UserRemember
{

    /**
     * @var string|null
     */
    private $value;

    public function __construct(?string $rememberToken)
    {

        $this->value = $rememberToken;
    }


    public function getValue(): ?string
    {
        return $this->value;
    }

}

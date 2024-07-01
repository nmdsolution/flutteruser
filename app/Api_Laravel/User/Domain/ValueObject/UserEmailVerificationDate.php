<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\Domain\ValueObject;


use DateTime;

class UserEmailVerificationDate
{

    /**
     * @var DateTime|null
     */
    private $value;

    public function __construct(?DateTime $emailVerificationDate )
    {

        $this->value = $emailVerificationDate;
    }

    /**
     * @return DateTime|null
     */
    public function getValue(): ?DateTime
    {
        return $this->value;
    }


}

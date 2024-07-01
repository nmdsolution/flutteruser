<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\Domain\ValueObject;


use InvalidArgumentException;


class UserEmail
{
    /**
     * UserEmail constructor.
     * @throws InvalidArgumentException
     */
    private $value;

    /**
     * UserEmail constructor.
     * @param string $email
     */
    public function __construct(string $email)
  {
      $this->validate($email);
      $this->value = $email;
  }

    /**
     * @param string $email
     */
    public function validate(string $email):void
  {
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            throw new InvalidArgumentException(
              sprintf('<%s> does not allow the invalid email: <%s>.',static::class, $email)
            );
        }
  }

    /**
     * @return string
     */
    public function value(): string
    {
        return $this->value;
    }


}

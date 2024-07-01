<?php


namespace App\Api_Laravel\User\Domain\ValueObject;




class UserPassword
{

    /**
     * @var string
     */
    private $value;

    public function __construct(string $password)
  {
      $this->value = $password;
  }

    /**
     * @return string
     */
    public function getValue():String
    {
        return $this->value;
    }


}

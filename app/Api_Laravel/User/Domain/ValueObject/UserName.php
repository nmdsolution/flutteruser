<?php


namespace App\Api_Laravel\User\Domain\ValueObject;


class UserName
{

    /**
     * @var string
     */
    private $value;


    public function __construct(string $name)
 {

     $this->value = $name;
 }

    /**
     * @return string
     */
    public function getValue():string
    {
        return $this->value;
    }

}

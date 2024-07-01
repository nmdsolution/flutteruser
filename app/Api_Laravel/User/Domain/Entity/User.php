<?php

declare(strict_types=1);
namespace App\Api_Laravel\User\Domain\Entity;


use App\Api_Laravel\User\Domain\ValueObject\UserEmail;
use App\Api_Laravel\User\Domain\ValueObject\UserEmailVerificationDate;
use App\Api_Laravel\User\Domain\ValueObject\UserId;
use App\Api_Laravel\User\Domain\ValueObject\UserName;
use App\Api_Laravel\User\Domain\ValueObject\UserPassword;
use App\Api_Laravel\User\Domain\ValueObject\UserRemember;
use Illuminate\Support\Carbon;

class User
{

    private $id;
    private $name;
    private $email;
    private $emailVerifiedDate;
    private $password;
    private $rememberToken;
    /**
     * @var Carbon|null
     */
    private $createAt;
    /**
     * @var Carbon|null
     */
    private $updatedAt;

    public function __construct
    (   UserId  $id ,
        UserName $name,
        UserEmail $email,
        UserEmailVerificationDate $emailVerifiedDate,
        UserPassword $password,
        UserRemember $rememberToken,
        Carbon       $createAt =null,
        Carbon       $updatedAt =null
    )

      {



          $this->id = $id;
          $this->name = $name;
          $this->email = $email;
          $this->emailVerifiedDate = $emailVerifiedDate;
          $this->password = $password;
          $this->rememberToken = $rememberToken;
          $this->createAt = $createAt;
          $this->updatedAt = $updatedAt;
      }

    /**
     * @return UserId
     */
    public function getId(): UserId
    {
        return $this->id;
    }



    public function getName():UserName
    {
        return $this->name;
    }


    public function getEmail(): UserEmail
    {
        return $this->email;
    }


    public function getEmailVerifiedDate():UserEmailVerificationDate
    {
        return $this->emailVerifiedDate;
    }


    public function getPassword():UserPassword
    {
        return $this->password;
    }


    public function getRememberToken():UserRemember
    {
        return $this->rememberToken;
    }

    /**
     * @return Carbon|null
     */
    public function getCreateAt(): ?Carbon
    {
        return $this->createAt;
    }

    /**
     * @return Carbon|null
     */
    public function getUpdatedAt(): ?Carbon
    {
        return $this->updatedAt;
    }

    public static function create
    (   UserId   $id,
        UserName $name,
        UserEmail $email,
        UserEmailVerificationDate $emailVerifiedDate,
        UserPassword $password,
        UserRemember $rememberToken):User
    {
        $user =new self(
            $id,
            $name,
            $email,
            $emailVerifiedDate,
            $password,
            $rememberToken);
        return $user;
    }


}

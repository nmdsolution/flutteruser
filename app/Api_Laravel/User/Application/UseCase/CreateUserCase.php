<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\Application\UseCase;

use App\Api_Laravel\User\Domain\ValueObject\UserId;
use DateTime;
use App\Api_Laravel\User\Domain\Entity\User;
use App\Api_Laravel\User\Domain\Repository\UserRepositoryContract;
use App\Api_Laravel\User\Domain\ValueObject\UserEmail;
use App\Api_Laravel\User\Domain\ValueObject\UserEmailVerificationDate;
use App\Api_Laravel\User\Domain\ValueObject\UserName;
use App\Api_Laravel\User\Domain\ValueObject\UserPassword;
use App\Api_Laravel\User\Domain\ValueObject\UserRemember;

final class CreateUserCase
{
    /**
     * @var UserRepositoryContract
     */
    private $repository;

    public function __construct(UserRepositoryContract $repository)
      {

          $this->repository = $repository;
      }
      public function __invoke(int       $userId,
                               string    $userName,
                               string    $userEmail,
                               ?DateTime $userEmailVerifiedDate,
                               string    $userPassword,
                               ?string   $userRememberToken):void
      {
          $id                  = new UserId($userId);
          $name                = new UserName($userName);
          $email               = new UserEmail($userEmail);
          $emailVerificationDate = new UserEmailVerificationDate($userEmailVerifiedDate);
          $password            = new UserPassword($userPassword);
          $rememberToken       = new UserRemember($userRememberToken);

          $user = User::create($id,$name,$email,$emailVerificationDate, $password, $rememberToken  );

          $this->repository->save($user);
      }
}

<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\Application\UseCase;


use App\Api_Laravel\User\Domain\Entity\User;
use App\Api_Laravel\User\Domain\Repository\UserRepositoryContract;
use App\Api_Laravel\User\Domain\ValueObject\UserEmail;
use App\Api_Laravel\User\Domain\ValueObject\UserName;

final class GetUserByCriteriaUseCase
{
    /**
     * @var UserRepositoryContract
     */
    private $ripository;

    public function __construct(UserRepositoryContract $ripository)
      {

          $this->ripository = $ripository;
      }

      public function __invoke(string $userName,string $userEmail):?User
      {
          $name = new UserName($userName);
          $email = new UserEmail($userEmail);
          $user = $this->ripository->findByCriteria($name,$email);
          return $user;
      }
}

<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\Application\UseCase;


use App\Api_Laravel\User\Domain\Entity\User;
use App\Api_Laravel\User\Domain\Repository\UserRepositoryContract;
use App\Api_Laravel\User\Domain\ValueObject\UserId;

final class GetUserUseCase
{

    private $repository;

    public function __construct(UserRepositoryContract $repository)
   {
       $this->repository = $repository;
   }

   public function __invoke(int $userId): ?User
   {
      $id = new UserId($userId);
      $user =$this ->repository->find($id);
      return $user;
   }
}


<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\Application\UseCase;


use App\Api_Laravel\User\Domain\Repository\UserRepositoryContract;

final class ListUserUseCase
{

    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): ?array
    {

        $users = $this->repository->findAll();
        return $users;
    }

}

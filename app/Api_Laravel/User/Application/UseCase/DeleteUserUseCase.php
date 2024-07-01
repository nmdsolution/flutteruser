<?php


namespace App\Api_Laravel\User\Application\UseCase;


use App\Api_Laravel\User\Domain\Repository\UserRepositoryContract;
use App\Api_Laravel\User\Domain\ValueObject\UserId;

class DeleteUserUseCase
{
    /**
     * @var UserRepositoryContract
     */
    private $repository;

    public function __construct(UserRepositoryContract $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(int $userId):void
    {
        $id = new UserId($userId);
        $this->repository->delete($id);

    }
}

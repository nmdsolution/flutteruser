<?php


namespace App\Api_Laravel\User\Domain\Repository;


use App\Api_Laravel\User\Domain\Entity\User;
use App\Api_Laravel\User\Domain\ValueObject\UserEmail;
use App\Api_Laravel\User\Domain\ValueObject\UserId;
use App\Api_Laravel\User\Domain\ValueObject\UserName;
use PhpParser\Node\Expr\Array_;

interface UserRepositoryContract
{
    /**
     * Retrieves all users from the repository.
     *
     * @return User[]|null An array of User entities or null if no users found.
     */
    public function findAll(): ?array;
     public function find(UserId $id): ?User;
     public function findByCriteria(UserName $name,UserEmail $email): ?User;
     public function save(User $user):void;
     public function update(UserId $userId,User $user):void;
     public function Delete(UserId $id):void;
}

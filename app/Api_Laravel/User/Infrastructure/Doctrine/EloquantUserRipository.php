<?php


namespace App\Api_Laravel\User\Infrastructure\Doctrine;

use App\Api_Laravel\User\Domain\ValueObject\UserEmailVerificationDate;
use App\Api_Laravel\User\Domain\ValueObject\UserPassword;
use App\Api_Laravel\User\Domain\ValueObject\UserRemember;
use App\Models\User as EloquentUserModel;
use App\Api_Laravel\User\Domain\Entity\User;
use App\Api_Laravel\User\Domain\Repository\UserRepositoryContract;
use App\Api_Laravel\User\Domain\ValueObject\UserEmail;
use App\Api_Laravel\User\Domain\ValueObject\UserId;
use App\Api_Laravel\User\Domain\ValueObject\UserName;
use Illuminate\Support\Carbon;


final class EloquantUserRipository implements UserRepositoryContract
{


    /**
     * @var EloquentUserModel
     */
    private $eloquentUserModel;

    public function __construct()
    {
        $this->eloquentUserModel = new  EloquentUserModel;
    }

    public function findAll(): ?array
    {
        $users = $this->eloquentUserModel->all();

        $userEntities = [];
        foreach ($users as $user) {
            $userEntities[] = new User(
                new UserId($user->id),
                new UserName($user->name),
                new UserEmail($user->email),
                new UserEmailVerificationDate($user->email_verified_at),
                new UserPassword($user->password),
                new UserRemember($user->remember_token),
                new Carbon($user->create_at),
                new Carbon($user->updated_at)
            );
        }

        return $userEntities;
    }

    public function find(UserId $id): ?User
    {
        $user = $this->eloquentUserModel->findOrFail($id->value());

        return new User(
            new UserId($user->id),
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerificationDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRemember($user->remember_token)
        );
    }

    public function findByCriteria(UserName $name, UserEmail $email): User
    {
        $user = $this->eloquentUserModel
            ->where('name', $name->getValue())
            ->where('email', $email->value())
            ->firstOrFail();
        return new User(
            new UserId($user->id),
            new UserName($user->name),
            new UserEmail($user->email),
            new UserEmailVerificationDate($user->email_verified_at),
            new UserPassword($user->password),
            new UserRemember($user->remember_token)
        );
    }

    public function save(User $user): void
    {
        $newUser = $this->eloquentUserModel;
        $data = [
            'name'              => $user->getName()->getValue(),
            'email'             => $user->getEmail()->value(),
            'email_verified_at' => $user->getEmailVerifiedDate()->getvalue(),
            'password'          => $user->getpassword()->getvalue(),
            'remember_token'    => $user->getRememberToken()->getvalue(),
        ];
        $newUser->create($data);

    }

    public function update(UserId $userId, User $user): void
    {
        // TODO: Implement update() method.
    }

    public function Delete(UserId $id): void
    {
            $this->eloquentUserModel
            ->findOrFail($id->value())
            ->delete();
    }


}

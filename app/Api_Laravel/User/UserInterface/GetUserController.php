<?php

declare(strict_types=1);
namespace App\Api_Laravel\User\UserInterface;


use App\Api_Laravel\User\Application\UseCase\GetUserUseCase;
use App\Api_Laravel\User\Infrastructure\Doctrine\EloquantUserRipository;

use Illuminate\Http\Request;


final class GetUserController
{


    private $ripository;

    public function __construct(EloquantUserRipository $ripository)
    {

        $this->ripository = $ripository;
    }

    public function __invoke(Request $request)
    {
        $userId = (int)$request->id;

        $getUserUseCase = new GetUserUseCase($this->ripository);
        $user           = $getUserUseCase->__invoke($userId);

        return $user;
    }
}

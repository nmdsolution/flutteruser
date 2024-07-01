<?php

declare(strict_types=1);

namespace App\Api_Laravel\User\UserInterface;


use App\Api_Laravel\User\Application\UseCase\ListUserUseCase;
use App\Api_Laravel\User\Infrastructure\Doctrine\EloquantUserRipository;
use Illuminate\Http\Request;

final class ListUserController
{
    /**
     * @var EloquantUserRipository
     */
    private $ripository;

    public function __construct(EloquantUserRipository $ripository)

  {
      $this->ripository = $ripository;
  }

   public function __invoke(Request $request)
   {

       $ListUserUseCase = new ListUserUseCase($this->ripository);
       $users           = $ListUserUseCase ->__invoke();
   return $users;
   }
}

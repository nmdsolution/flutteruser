<?php


namespace App\Api_Laravel\User\UserInterface;


use App\Api_Laravel\User\Application\UseCase\GetUserByCriteriaUseCase;
use App\Api_Laravel\User\Infrastructure\Doctrine\EloquantUserRipository;
use Illuminate\Http\Request;


final class GettUserByCriteriaController
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
        $userName  = $request->input('name');
        $userEmail = $request->input('email');

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->ripository);
        $user                     = $getUserByCriteriaUseCase->__invoke($userName, $userEmail);

        return $user;
    }
}

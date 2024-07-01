<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\UserInterface;


use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Api_Laravel\User\Application\UseCase\CreateUserCase;
use App\Api_Laravel\User\Application\UseCase\GetUserByCriteriaUseCase;
use App\Api_Laravel\User\Infrastructure\Doctrine\EloquantUserRipository;



final class CreateUserController extends Controller
{

    private $ripository;

    public function __construct(EloquantUserRipository $ripository)
  {
      $this->ripository = $ripository;
  }


    public function __invoke(Request $request)
    {   $userId                = $request->input('id');
        $userName              = $request->input('name');
        $userEmail             = $request->input('email');
        $userEmailVerifiedDate = null;
        $userPassword          = Hash::make($request->input('password'));
        $userRememberToken     = null;

        $createUserUseCase = new CreateUserCase($this->ripository);
        $createUserUseCase->__invoke(
            (int)$userId,
            $userName,
            $userEmail,
            $userEmailVerifiedDate,
            $userPassword,
            $userRememberToken
        );

        $getUserByCriteriaUseCase = new GetUserByCriteriaUseCase($this->ripository);
        $newUser                  = $getUserByCriteriaUseCase->__invoke($userName, $userEmail);

        $message = 'User created successfully!';  // Add message here

        $responseData = [
            'message' => $message,
            'user' => $newUser,
        ];

        return response()->json($responseData, 200); // Set status code to Created (201)
    }
}

<?php
declare(strict_types=1);

namespace App\Api_Laravel\User\UserInterface;

use InvalidArgumentException;
use App\Api_Laravel\User\Application\UseCase\DeleteUserUseCase;
use App\Api_Laravel\User\Infrastructure\Doctrine\EloquantUserRipository;
use Illuminate\Http\Request;

final class DeleteUserController
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

            $userId = (int) $request->route('id');

       $deleteUserUseCase = new DeleteUserUseCase($this->ripository);
       $deleteUserUseCase->__invoke($userId);

       // Construct success response
       $message = 'User deleted successfully!';
       $responseData = [
           'message' => $message,
           'user_id' => $userId, // Optionally include the deleted user ID in the response
       ];

       return response()->json($responseData, 200); // HTTP status code corrected to 200 for success
      }

}

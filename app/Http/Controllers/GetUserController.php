<?php


namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class GetUserController extends Controller
{
    /**
     * @var \App\Api_laravel\User\UserInterface\GetUserController
     */
    private $getUserController;

    public function __construct(\App\Api_laravel\User\UserInterface\GetUserController $getUserController)
    {
        $this->getUserController = $getUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $user = new UserResource($this->getUserController->__invoke($request));

        return response($user, 200);
    }
}

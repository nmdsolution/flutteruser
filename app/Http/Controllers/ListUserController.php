<?php


namespace App\Http\Controllers;


use App\Http\Resources\UserResource;
use Illuminate\Http\Request;

class ListUserController extends Controller
{


    /**
     * @var \App\Api_laravel\User\UserInterface\ListUserController
     */
    private $listUserController;

    public function __construct(\App\Api_laravel\User\UserInterface\ListUserController $listUserController)
    {


        $this->listUserController = $listUserController;
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function __invoke(Request $request)
    {
        $users = $this->listUserController->__invoke($request);

        $userResources = UserResource::collection(collect($users));

        return response()->json($userResources, 200); // Return JSON response
    }
}

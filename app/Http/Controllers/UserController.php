<?php

namespace App\Http\Controllers;

use App\Http\Resources\User\UserResource;
use App\Services\User\RegisterUser;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function register(Request $request)
    {
        try {
            [$user, $token] = app(RegisterUser::class)->execute($request->all());
            return response([
                'data' => [
                    'name' =>$request->name,
                    'token' => $token,
                ],
            ]);
        }catch (ValidationException $exception){
            return response([
                'errors' => $exception->validator->errors()->all(),
            ], 422);
        }
    }
    public function logIn(Request $request)
    {

    }
    public function getMe()
    {

    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\UseCases\User\StoreUserCommand;
use App\UseCases\User\StoreUserCommandHandler;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

final class UserController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $users = User::all(['id', 'name', 'email']);

        return UserResource::collection($users);
    }

    public function store(StoreUserRequest $request, StoreUserCommandHandler $handler): UserResource
    {
        $user = $handler->handle(StoreUserCommand::fromArray($request->validated()));

        return new UserResource($user);
    }
}

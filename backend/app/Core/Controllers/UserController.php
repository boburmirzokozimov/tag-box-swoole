<?php

namespace App\Core\Controllers;

use App\Core\Exceptions\User\UserNotFoundException;
use App\Core\Models\User;
use App\Core\Resources\UserResource;
use App\Core\Tasks\User\FindUserByIdTask;
use App\Core\UseCases\User\Delete\DeleteUserCommandHandler;
use App\Core\UseCases\User\Store\StoreUserCommand;
use App\Core\UseCases\User\Store\StoreUserCommandHandler;
use App\Core\UseCases\User\Store\StoreUserRequest;
use App\Core\UseCases\User\Update\UpdateUserCommand;
use App\Core\UseCases\User\Update\UpdateUserCommandHandler;
use App\Core\UseCases\User\Update\UpdateUserRequest;
use App\Ship\Abstractions\Controllers\Controller;
use App\Ship\ApiResource;
use Illuminate\Http\JsonResponse;

final class UserController extends Controller
{
    public function index(): ApiResource
    {
        $users = User::all(['id', 'name', 'email']);

        return new ApiResource(UserResource::collection($users));
    }

    /**
     * @throws UserNotFoundException
     */
    public function show(int $id, FindUserByIdTask $findUserByIdTask): ApiResource
    {
        $user = $findUserByIdTask->run($id);

        return new ApiResource(new UserResource($user));
    }

    public function store(StoreUserRequest $request, StoreUserCommandHandler $handler): ApiResource
    {
        $user = $handler->handle(StoreUserCommand::fromArray($request->validated()));

        return new ApiResource(new UserResource($user));
    }

    /**
     * @throws UserNotFoundException
     */
    public function update(int $id, UpdateUserRequest $request, UpdateUserCommandHandler $handler): ApiResource
    {
        $user = $handler->handle($id, UpdateUserCommand::fromArray($request->validated()));

        return new ApiResource(new UserResource($user));
    }

    /**
     * @throws UserNotFoundException
     */
    public function delete(int $id, DeleteUserCommandHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json([
            "success" => true,
            "data" => [],
            "error" => []
        ]);
    }
}

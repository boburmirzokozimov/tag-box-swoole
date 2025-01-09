<?php

namespace Core\Controllers;

use Core\Exceptions\User\UserNotFoundException;
use Core\Models\User;
use Core\Resources\UserResource;
use Core\Tasks\User\FindUserByIdTask;
use Core\UseCases\User\Delete\DeleteUserCommandHandler;
use Core\UseCases\User\Store\StoreUserCommand;
use Core\UseCases\User\Store\StoreUserCommandHandler;
use Core\UseCases\User\Store\StoreUserRequest;
use Core\UseCases\User\Update\UpdateUserCommand;
use Core\UseCases\User\Update\UpdateUserCommandHandler;
use Core\UseCases\User\Update\UpdateUserRequest;
use Illuminate\Http\JsonResponse;
use Log;
use Ship\Abstractions\Controllers\Controller;
use Ship\Resource\ApiResource;

final class UserController extends Controller
{
    public function index(): ApiResource
    {
        $users = User::all(['id', 'name', 'email']);
        Log::debug($users);

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

<?php

namespace Core\Controllers;

use Core\Resources\TagResource;
use Core\UseCases\Tag\Store\StoreTagCommand;
use Core\UseCases\Tag\Store\StoreTagCommandHandler;
use Ship\Abstractions\Controllers\Controller;
use Ship\Resource\ApiResource;

class TagController extends Controller
{
    public function store(StoreTagCommandHandler $handler)
    {
        $tag = $handler->handle(StoreTagCommand::fromArray([
            'name' => 'Hello',
            'description' => "World",
            'type' => 'new type'
        ]));
        return ApiResource::collection(new TagResource($tag));
    }
}

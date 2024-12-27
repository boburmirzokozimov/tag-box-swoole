<?php

namespace Core\Resources;

use Core\Models\User;
use Illuminate\Http\Request;
use Ship\Resource\ApiResource;

/** @mixin User */
class UserResource extends ApiResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
        ];
    }
}

<?php

namespace App\Core\Resources;

use App\Core\Models\User;
use App\Ship\ApiResource;
use Illuminate\Http\Request;

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

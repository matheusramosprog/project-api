<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AuthUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            "token" => $this['token'],
            "token_type" => "bearer",
            "expires_in" => auth()->factory()->getTTL() * 300000
        ];
    }
}
<?php

namespace App\Business;

use App\Business\Business;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Payload;

trait ExternalAuth
{
    use Business;

    public function decodeToken(): Payload
    {
        try {
            $token = JWTAuth::getToken();
            return JWTAuth::getPayload($token);
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Token expired');
        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        } catch (\Tymon\JWTAuth\Exceptions\JWTException $e) {
            abort(Response::HTTP_UNAUTHORIZED, 'Unauthorized');
        }
    }
}
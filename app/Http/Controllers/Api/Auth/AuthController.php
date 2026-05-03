<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Auth\LoginRequest;
use App\Http\Requests\Api\Auth\RegisterRequest;
use App\Services\AuthService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
  public function __construct( protected AuthService $authService) 
  {}
  public function register(RegisterRequest $request)
  {
    $data = $request->validated();
    $result = $this->authService->register($data);
    return response()->json($result, Response::HTTP_CREATED);
    
  }
  public function login(LoginRequest $request)
  {
    $data = $request->validated();
    $result = $this->authService->login($data);
    return response()->json($result, Response::HTTP_OK);
  }
  public function logout()
  {
    $this->authService->logout();
    return response()->json(['message' => 'Logged out successfully'], Response::HTTP_OK);
  }

}

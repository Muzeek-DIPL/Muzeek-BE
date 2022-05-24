<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\UserInterface;

class UserController extends Controller
{
    protected $userInterface;

    public function __construct(UserInterface $userInterface)
    {
        $this->userInterface = $userInterface;
    }

    public function register(Request $request)
    {
        return $this->userInterface->register($request);
    }

    public function login(Request $request)
    {
        return $this->userInterface->login($request);
    }

    public function update(Request $request)
    {
        return $this->userInterface->update($request);
    }

    public function logout()
    {
        return $this->userInterface->logout();
    }

    public function publish(Request $request)
    {
        return $this->userInterface->publish($request);
    }
}
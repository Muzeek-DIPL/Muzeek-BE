<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface UserInterface
{
    public function register(Request $request);
    public function login(Request $request);
    public function update(Request $request);
    public function logout();
    public function publish(Request $request);
    public function update_instrument(Request $request);
}
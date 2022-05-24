<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface CommentInterface
{
    public function post(Request $request, $musician_id);
    public function delete(int $id);
    public function get_by_musician(int $musician_id);
}
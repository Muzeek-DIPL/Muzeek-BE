<?php

namespace App\Interfaces;

use Illuminate\Http\Request;

interface MusicianInterface
{
    public function get(Request $request);
    public function get_by_id(int $id);
    public function like(Request $request, int $id);
}
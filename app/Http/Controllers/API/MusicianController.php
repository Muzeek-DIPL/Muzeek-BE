<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\MusicianInterface;

class MusicianController extends Controller
{
    protected $musicianInterface;

    public function __construct(MusicianInterface $musicianInterface)
    {
        $this->musicianInterface = $musicianInterface;
    }

    public function get(Request $request)
    {
        return $this->musicianInterface->get($request);
    }

    public function get_by_id(int $id)
    {
        return $this->musicianInterface->get_by_id($id);
    }

    public function like(Request $request, int $id)
    {
        return $this->musicianInterface->like($request, $id);
    }
}
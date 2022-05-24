<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Interfaces\CommentInterface;

class CommentController extends Controller
{
    protected $commentInterface;

    public function __construct(CommentInterface $commentInterface)
    {
        $this->commentInterface = $commentInterface;
    }

    public function post(Request $request, $musician_id)
    {
        return $this->commentInterface->post($request, $musician_id);
    }

    public function delete(int $id)
    {
        return $this->commentInterface->delete($id);
    }

    public function get_by_musician(int $musician_id)
    {
        return $this->commentInterface->get_by_musician($musician_id);
    }
}
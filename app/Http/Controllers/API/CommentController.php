<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\ResponseBuilder;
use App\Models\Comment;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function post(Request $request, $musician_id)
    {
        $validator = Validator::make($request->all(), [
            'text' => 'required|string',
        ]);

        if ($validator->fails()) {
            return ResponseBuilder::error($validator->errors()->all(), 422);
        }

        $comment = Comment::create([
            'commenter_id' => $request->user()->id,
            'musician_id' => $musician_id,
            'text' => $request->text,
        ]);

        return ResponseBuilder::success($comment, "Comment success");
    }

    public function delete(int $id)
    {
        $comment = Comment::find($id);
        $comment->delete();

        return ResponseBuilder::success(null, "Comment deleted");

    }

    public function get_by_musician(int $musician_id)
    {
        $comments = Comment::with('commenters:id,full_name,img_link')
            ->where('musician_id', $musician_id)
            ->get();

        return ResponseBuilder::success($comments, "Get comments success");
    }
}
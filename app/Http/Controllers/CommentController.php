<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function postComment(Request $request,Post $id)
    {
    	  $comment = new Comment;
    	  $comment->body = $request->comment;
    	  $comment->post_id = $id->id;
    	  $comment->user_id = $request->auth;
    	  $comment->save();
    	  return back();
    }
}
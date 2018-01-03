<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Comment;

class CommentController extends Controller
{
    public function postComment(Request $request)
    {
    	  $comment = new Comment;
    	  $comment->body = $request->comment;
    	  $comment->post_id = $request->id;
    	  $comment->user_id = $request->auth;
    	  $comment->save();
    	  //return back();

        return 'Done';
    }
}
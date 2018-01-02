<?php
namespace App\Http\Controllers;
use App\Category;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class MakkahController extends Controller
{
    public function news()
    {
        $news = Category::find(1)->posts;
        return view('news', compact('news'));
    }
    /////////////////////////////////////////////////
    public function completepro()
    {
        $news = Category::find(2)->posts;
        return view('news', compact('news'));
    }
    //////////////////////////////////////////////////////////
    public function futurepro()
    {
        $news = Category::find(3)->posts;
        return view('news', compact('news'));
    }
    ////////////////////////////////////////////////////////
    public function postsDetails(Post $id)
    {
        return view('posts',compact('id'));
    }
    /////////////////album//////////////////////////////////
    public function album()
    {
        return view('album');
    }
}

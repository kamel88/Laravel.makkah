<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Post;
use Validator;

class FutureProController extends Controller
{
    public function show()
    {
        $future = Category::find(3)->posts;
        return view('admin.future.future-pro', compact('future'));
    }
    ///////////////////Store Function
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'subject' => 'required',
            'picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->passes()) {

            $img_name = rand() . time() . '.' . $request->picture->getClientOriginalExtension();

            $fut = new Post;
            $fut->title = $request->title;
            $fut->subject = $request->subject;
            $fut->picture = $img_name;
            $fut->category_id = 3;

            $request->picture->move(public_path('upload'), $img_name);

            $fut->save();
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }
    //////////////////////////DELET
    public function deletefut(request $request)
    {
        $del = Post::find($request->id);
        $filename = public_path() . '/upload/' . $del->picture;
        if (file_exists($filename)){unlink($filename);}
        $del->comments()->delete();
        $del->delete();
        return $filename;
    }
//    //////////////////////EDIT
    public function editfut(request $request)
    {
        $future = Post::find($request->id);
        return $future;
    }
//
//    /////////////////////Update
    public function updatefut(request $request)
    {
        $future = Post::find($request->id);
        if (!empty($request->picture)) {
            $filename = public_path() . '/upload/' . $future->picture;
            if (file_exists($filename)) {
                unlink($filename);
            }
            $img_name = rand() . time() . '.' . $request->picture->getClientOriginalExtension();
            $future->picture = $img_name;
            $request->picture->move(public_path('upload'), $img_name);
        }
        $future->title = $request->title;
        $future->subject = $request->subject;
        $future->save();
        return $img_name;
    }
}
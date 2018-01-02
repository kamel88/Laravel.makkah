<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\Category;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    ///////////////////////
    public function index(){return view('admin.index');}
    
    public function newsadd(){return view('admin.news.newsadd');}

	public function show()
    {
        $news = Category::find(1)->posts;
        return view('admin.news.news', compact('news')); 
    }

    public  function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required | min:5',
            'subject' => 'required | min:20',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'title.required'=>'تأكد من اضافة عنوان للخبر','title.min'=>'عنوان الخبر قصير',
                'subject.required'=>'تأكد من اضافة خبر','subject.min'=>'محتوى الخبر قصير جدا',
                'picture.required'=>'تأكد من رفع صورة','picture.image'=>'الملف المرفوع ليس صورة','picture.mimes'=>'(jpeg,png,jpg,gif)الملف يجب ان يكون من نوع',
            ]);
            $img_name = rand() . time() . '.' . $request->picture->getClientOriginalExtension();
            $news = new Post();
            $news->title = $request->title;
            $news->subject = $request->subject;
            $news->picture = $img_name;
            $news->category_id = 1;
            $news->save();
            $request->picture->move(public_path('upload'), $img_name);
            return redirect('admin/news');
    }

    public  function delete(Post $id)
    {
        $filename = public_path().'/upload/'.$id->picture;
        if(file_exists($filename)){
            unlink($filename);
        }
        $id->delete();
        $id->comments()->delete();
        return back();
    }

    public function edit(Post $id)
    {
        return view('admin.news.newsedit',compact('id'));
    }

    public function update(Request $request)
    {
        $news = Post::find($request->id);
        //////////picture Update
        $pic = $request->picture;
        if(!empty($pic))
        {
            $filename = public_path().'/upload/'.$news->picture;
            if(file_exists($filename)){
                unlink($filename);
            }
            $img_name = rand().time(). '.' . $request->picture->getClientOriginalExtension();
            $news->picture = $img_name;
            $request->picture->move(public_path('upload'), $img_name);
        }
        $news->title = $request->title;
        $news->subject = $request->subject;
        $news->save();
        return redirect('admin/news');
    }
}
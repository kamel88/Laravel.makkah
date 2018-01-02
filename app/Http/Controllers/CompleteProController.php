<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use App\Category;
use App\Post;
class CompleteProController extends Controller
{
    public  function show()
    {
        $complete = Category::find(2)->posts;
        return view('admin.complete.complete-pro', compact('complete'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required | min:5',
            'subject' => 'required | min:20',
            'picture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ],
            [
                'title.required'=>'تأكد من اضافة عنوان للخبر','title.min'=>'عنوان الخبر قصير',
                'subject.required'=>'تأكد من اضافة خبر','subject.min'=>'محتوى الخبر قصير جدا',
                'picture.required'=>'تأكد من رفع صورة','picture.image'=>'الملف المرفوع ليس صورة','picture.mimes'=>'(jpeg,png,jpg,gif)الملف يجب ان يكون من نوع',
            ]
        );
        if ($validator->passes()) {

            $img_name = rand().time(). '.' . $request->picture->getClientOriginalExtension();

            $coms = new Post;
            $coms->title = $request->title;
            $coms->subject = $request->subject;
            $coms->picture = $img_name;
            $coms->category_id = 2;
            $request->picture->move(public_path('upload'),$img_name);
            $coms->save();
            return response()->json(['success' => 'done']);
        }
        return response()->json(['error' => $validator->errors()->all()]);
    }

    public function deletecom(request $request)
    {
        $del = Post::find($request->id);
        $filename = public_path() . '/upload/' . $del->picture;
        if (file_exists($filename)){unlink($filename);}
        $del->comments()->delete();
        $del->delete();
        return 'Done';
    }

    // //////////////////////EDIT
    public  function editcom(request $request) {
        $future = Post::find($request->id);
        return $future;
    }
    /////////////////////Update
    public function updatecom(request $request)
    {
        $coms = Post::find($request->id);
        if (!empty($request->pictureUp)) {
            $filename = public_path() . '/upload/' . $coms->picture;
              if (file_exists($filename)) {
              unlink($filename);
              }
            $img_name = rand() . time() . '.' . $request->pictureUp->getClientOriginalExtension();
            $coms->picture = $img_name;
            $request->pictureUp->move(public_path('upload'), $img_name);
        }
        $coms->title = $request->titleUp;
        $coms->subject = $request->subjectUp;

        $coms->save();

        return $img_name;
    }
}
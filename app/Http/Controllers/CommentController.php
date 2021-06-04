<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('user')->where('parent_id',null)->latest('id')->paginate(25);
        return view('comments.index', compact('comments'));
    }
    public function answer()
    {
        return view('comments.answer');
    }
    public function comments($id)
    {
        $parent=Comment::with('user')->find($id);
        $comments = Comment::with('user')->where('parent_id',$id)->get();
        return view('comments.comments', compact('comments','parent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CommentRequest $request)
    {
        $arr =$request->all();
        $arr['user_id']=auth()->id();
        unset($arr['_token']);
        if($request->has('image')){
            $arr['image']= $this->saveImage($request->file('image'));
        }
        $comment = Comment::create($arr);
        $request->session()->flash('status', '<strong>Успешно.</strong> Коментарие #' . $comment->id . ' добавлен');
        return redirect()->route('comments.list',$request->parent_id);
    }
    public function answerStore(Request $request)
    {
        $this->validate($request, [
            'text' => 'required|string|min:2|max:1000',
            'image' => 'required|image|mimes:jpg,jpeg,png,svg,gif|max:2048',
        ]);
        $arr =$request->all();
        $arr['user_id']=auth()->id();
        $arr['image']= $this->saveImage($request->file('image'));
        unset($arr['_token']);
        $comment = Comment::create($arr);
        $request->session()->flash('status', '<strong>Успешно.</strong> Вопрос #' . $comment->id . ' добавлен');
        return redirect()->route('comments.list',$comment->id);
    }
    public function saveImage($file){
        $width = 500; // your max width
        $height = 500; // your max height
        $img = Image::make($file);
        $img->height() > $img->width() ? $width=null : $height=null;
        $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
        });
        $RandomAccountNumber = uniqid();
        $extension = '.' . explode("/", $img->mime())[1];
        $fileName=$RandomAccountNumber.$extension;
        $img->save(storage_path('/app/public/'.$fileName));
        return 'storage/'.$fileName;
    }
}

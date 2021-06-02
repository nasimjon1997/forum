<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::with('user')->where('parent_id',null)->latest('id')->paginate(50);
        return view('comments.index', compact('comments'));
    }
    public function answer()
    {
        return view('comments.answer');
    }
    public function comments($id)
    {
        $parent=Comment::with('user')->find($id);
        $comments = Comment::with('user')->where('parent_id',$id)->paginate(50);
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
    public function store(Request $request)
    {
        $arr =$request->all();
        $arr['user_id']=auth()->id();
        unset($arr['_token']);
        $comment = Comment::create($arr);
        $request->session()->flash('status', '<strong>Успешно.</strong> Коментарие #' . $comment->id . ' добавлен');
        return redirect()->route('comments.list',$request->parent_id);
    }
    public function answerStore(Request $request)
    {
        $arr =$request->all();
        $arr['user_id']=auth()->id();
        $arr['image']=  str_replace('public','storage',$request->file('image')->store('public'));
        unset($arr['_token']);
        $comment = Comment::create($arr);
        $request->session()->flash('status', '<strong>Успешно.</strong> Вопрос #' . $comment->id . ' добавлен');
        return redirect()->route('comments.list',$comment->id);
    }
}

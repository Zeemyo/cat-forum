<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;
use App\Reply;

class CommentsController extends Controller
{



      // @return \Illuminate\Http\Response

    public function index()
    {

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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Auth::check()) {
            /* dd($request->all())6; */
            Comment::create([
                'name' => Auth::user()->name,
                'comment' => $request->input('comment'),
                'id_user' => Auth::id(),
                'id_postingan' => $request->id_postingan
            ]);

        //     return redirect()->route('postingan/' . $id . 'show/')->with('success','Comment Added successfully..!');
        // }else{
            return back()->withInput()->with('error','Something wrong');
        }



    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */

     public function destroy($id)
     {
       $comment = Comment::findOrFail($id);

       $comment->delete();
       return redirect('postingan/' . $id . 'show/');
     }

    // public function destroy(Comment $comment)
    // {
    //     if (Auth::check()) {
    //
    //         $reply = Reply::where(['comment_id'=>$comment->id]);
    //         $comment = Comment::where(['user_id'=>Auth::user()->id, 'id'=>$comment->id]);
    //         if ($reply->count() > 0 && $comment->count() > 0) {
    //             $reply->delete();
    //             $comment->delete();
    //             return 1;
    //         }else if($comment->count() > 0){
    //             $comment->delete();
    //             return 2;
    //         }else{
    //             return 3;
    //         }
    //
    //     }
    // }

}

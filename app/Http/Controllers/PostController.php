<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Users;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


        // $JD= Auth::user()->name;
        $post=Post::join("users", "post.users_id", "=", "users.id")->where('state', 2)
        ->paginate(8);

        return view('post.index',['post'=>$post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=Users::all();
        $post=Post::all();
        return view('post.add',['post'=>$post,'user'=>$user]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title=$request->get('title');
        $posts=$request->get('posts');
        $user_id=$request->get('user_id');
        $state=$request->get('state');
        $data=new Post();
        $data->title=$title;
        $data->post=$posts;
        $data->users_id=$user_id;
        $data->state=1;
        $data->save();
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::where('id_post',$id)->first();
        return view('post.edit',compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $title=$request->get('title');
        $posts=$request->get('posts');
        $data =  Post::find($id);
        $data->title=$title;
        $data->post=$posts;
        $data->save();
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::where('id_post', $id)->delete();
        return redirect()->back();
    }
}

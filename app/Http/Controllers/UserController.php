<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateAvatar(Request $request, User $user)
    {
        $this->validate($request, [
            'avatar' => 'image|mimes:jpeg,jpg,png,gif,svg' // |max:1024|dimensions:height=128,width=128
        ]);
        if($request->hasFile('avatar')){//Upload picture for current Post
            $path = $request->file('avatar')->store('users');
            if($user->image){
                Storage::delete($user->image->path);
                $user->image->path = $path;
                $user->image->save();
            }else{
                $user->image()->save(Image::make(['path' => $path]));
            }
            return redirect()->back()->withStatus('User updated');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user = User::with('image')->findOrFail($user->id);
        //dd($user);
        $posts = Post::with('comments', 'liked', 'disliked')->where('user_id', $user->id)->orderBy('created_at', 'desc')->get();
        //dd($posts);
        return view('users.show', compact('user', 'posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        if(Auth()->user()->id == $user->id || Auth()->user()->is_admin == 1){
            return view('users.edit',['user' => $user]);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if(Auth()->user()->id == $user->id || Auth()->user()->is_admin == 1){
            $this->validate($request, [
                'name'=>'required|max:100',
                'email'=>'required|email',
                'password'=>'required|min:8|confirmed'
            ]);
            $user = User::findOrFail($user->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            return redirect()->back()->with('success','User successfully edited.');
        }
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\user  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}

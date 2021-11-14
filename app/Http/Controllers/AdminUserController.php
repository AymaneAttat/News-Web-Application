<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Dislike;
use App\Models\PostUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminUserController extends Controller
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
        $this->authorize("viewAny", User::class);
        $users = User::with('posts')->orderBy('created_at', 'desc')->paginate(4);/*->get()paginate(3)*/
        $postcount = Post::count();
        return view('admin.index', compact('users', 'postcount'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userpost($id){
        $user = User::findOrFail($id);
        $postcount = Post::count();
        $posts = Post::with('comments', 'liked', 'disliked')->where('user_id', $id)->orderBy('created_at', 'desc')->get();
        //$likes = PostUser::where('post_id' , $id)->get();
        return view('admin.listUserPost', compact('user', 'postcount', 'posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteuserpost($id){
        $post = Post::findOrFail($id);
        //$posts = Post::where('user_id', $id)->pluck('id');
        //$post = Post::where('user_id', $id)->get();
        //dd(Comment::whereIn('commentable_id', $posts)->first());
        //dd($post);
        //dd(PostUser::whereIn('post_id',$posts)->first());
        /*foreach ($post as $pos) {
            $likesuser = PostUser::where('post_id',$pos->id)->get();
            $dislikesuser = Dislike::where('post_id',$pos->id)->get();
            //dd($likesuser);
            Comment::where('commentable_id', $pos->id)->delete();
            //dd(Comment::where('commentable_id', $pos->id)->get());
            foreach ($likesuser as $like) {
                $like->delete();
            }
            foreach ($dislikesuser as $dislike) {
                $dislike->delete();
            }
        }*/
        Comment::where('post_id', $id)->delete();
        //Comment::whereIn('commentable_id', $posts)->delete();
        PostUser::where('post_id',$id)->delete();
        Dislike::where('post_id',$id)->delete();
        //PostUser::whereIn('post_id',$posts)->delete();
        //Post::where('user_id', $id)->delete();
        $post->delete();
        return redirect()->back()->with('success','Post successfully deleted.');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function userpostcomment($id){
        $comments = Comment::with('post', 'user')->where('commentable_id', $id)->orderBy('created_at', 'desc')->get();
        $post = Post::with('user')->findOrFail($id);
        return view('admin.listUserComment', compact('comments', 'post'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function deleteuserpostcomment($id){
        Comment::findOrFail($id)->delete();
        return redirect()->back()->with('success','Comment successfully deleted.');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize("create", User::class);
        $this->validate($request, [
            'name'=>'required|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|confirmed'
        ]);
        /*$user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->is_admin = 0;
        $user->save();*/
        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
            'is_admin' => 0
        ]);
        return redirect()->route('admin.index')->with('success','User successfully added.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        $this->authorize("view", User::class);
        return view('admin.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize("update", User::class);
        $user = User::findOrFail($id);
        
        return view('admin.edit', compact('user'));
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
        $this->authorize("update", User::class);
        $this->validate($request, [
            'name'=>'required|max:100',
            'email'=>'required|email',
            'password'=>'required|min:8|confirmed'
        ]);
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('admin.index')->with('success','User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize("delete", User::class);
        $user = User::with('posts', 'comments')->findOrFail($id);
        /*if($user->is_admin == 0){
            //$user->posts()->delete();
            $posts = Post::where('user_id', $id)->get();
            $pots = Post::get();
            //dd($pots);
            $comments = Comment::where('user_id', $id)->get();
            foreach ($pots as $post) {
                //$likePost = PostUser::where('user_id',$id)->count();
                //$dislikePost = Dislike::where('user_id',$id)->count();
                $likePostuser = PostUser::where(['post_id' => $post->id, 'user_id' => $id ])->count();
                //dd($post->id);
                $dislikePost = Dislike::where(['post_id' => $post->id, 'user_id' => $id ])->count();
                if($likePostuser > 0){
                    $like = PostUser::where(['post_id' => $post->id, 'user_id' => $id ]);
                    Post::find($post->id)->decrement('like', 1);
                    $like->delete();
                }
                if($dislikePost > 0){
                    $dislike = Dislike::where(['post_id' => $post->id, 'user_id' => $id ]);
                    Post::find($post->id)->decrement('dislike', 1);
                    $dislike->delete();
                }
                //Post::find($post)->decrement('like', 1);
                //$count = PostUser::count($findPost);
                //dd($dislikePost);
                //$post->like = $findPost;$post->dislike = $dislikePost;
                //$post->save();
            }
            //dd(PostUser::where('user_id' , $id));
            //dd(isset($comments));
            if (isset($comments)) {
                foreach ($comments as $comment) {
                    $comment->delete();
                }
            }
            if (isset($posts)) {
                foreach ($posts as $post) {
                    /*$commets = Comment::where('commentable_id', $post->id)->get();
                    if (isset($comments)) {
                        foreach ($comments as $comment) {
                            $comment->delete();
                        }
                    }
                    $post->comments->delete();
                }
            }
            //$comments->delete();
            //$posts->delete();
            
        }*/
        $posts = Post::where('user_id', $id)->pluck('id');
        $post = Post::where('user_id', $id)->get();
        //dd(Comment::whereIn('commentable_id', $posts)->first());
        //dd($post);
        //dd(PostUser::whereIn('post_id',$posts)->first());
        foreach ($post as $pos) {
            $likesuser = PostUser::where('post_id',$pos->id)->get();
            $dislikesuser = Dislike::where('post_id',$pos->id)->get();
            //dd($likesuser);
            Comment::where('commentable_id', $pos->id)->delete();
            //dd(Comment::where('commentable_id', $pos->id)->get());
            foreach ($likesuser as $like) {
                $like->delete();
            }
            foreach ($dislikesuser as $dislike) {
                $dislike->delete();
            }
        }

        //dd(PostUser::where('post_id',$post->id)->get());
        //dd(PostUser::where('user_id',$id)->get());
        //$postp = Post::where('user_id', $id)->first();
        //dd(PostUser::where('post_id',$postp->id)->get());
        Comment::where('user_id', $id)->delete();
        //Comment::whereIn('commentable_id', $posts)->delete();
        PostUser::where('user_id',$id)->delete();
        Dislike::where('user_id',$id)->delete();
        //PostUser::whereIn('post_id',$posts)->delete();
        Post::where('user_id', $id)->delete();
        $user->delete();
        return redirect()->route('admin.index')->with('success','User successfully deleted.');
        //return redirect()->route('admin.index')->with('error',"you can't deleted an admin.");
    }
}

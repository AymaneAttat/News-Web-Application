<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Dislike;
use App\Models\PostUser;
use Illuminate\Http\Request;

class PostsController extends Controller
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
        $posts = Post::with('comments', 'liked', 'disliked')->orderBy('created_at', 'desc')->get();
        //$counters = $posts->comments()->count();
        //$postscom = Post::withCount('comments')
        //->orderBy('comments_count', 'desc');{{$post->likedUsers->count()}}
        foreach ($posts as $post) {
            $findPost = PostUser::where('post_id',$post->id)->count();
            $dislikePost = Dislike::where('post_id',$post->id)->count();
            //$count = PostUser::count($findPost);
            //dd($dislikePost);
            $post->like = $findPost;
            $post->dislike = $dislikePost;
            $post->save();
        }
        
        //dd($postscom);
        return view('posts.index', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function guest()
    {
        $posts = Post::orderBy('created_at', 'desc')->get();
        return view('posts.guest')->with('posts', $posts);
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
        $this->validate($request, [
            'title' => 'required|min:3|max:70|bail',
            'content' => 'required|min:3',
            'url' => 'unique:posts'
        ]);
        //Créer un news
        $posts = new Post;
        $posts->title = $request->input('title');
        $posts->url = $request->input('url');
        $posts->content = $request->input('content');
        $posts->user_id = auth()->user()->id;
        //$posts->cover_image = $fileNameToStore;
        $posts->save();
        $request->session()->flash('status', 'News créer avec succès');
        return redirect()->route('posts.index')->with('success', 'Post Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function likePost(Request $request, $post)
    {
        //Check if user already liked the post or not->attach($post)
        $user = Auth::user();
        $likePost = PostUser::where(['post_id' => $post, 'user_id' => $user->id ])->count();
        //$likePost = $user->likedPosts()->where('post_id', $post)->count();
        //dd($likePost);
        if($likePost == 0){
            $like = new PostUser();
            $like->user_id = $request->user()->id;
            $like->post_id = $request->id;
            $like->save();
            //$user->likedPosts()->attach($post);
            /*$user->likedPosts()->create([
                'post_id' => $request->id,
                'user_id' => $request->user()->id ]);*/
        }else{
            $like = PostUser::where(['post_id' => $post, 'user_id' => $user->id ]);
            //$dec = Post::find($post)->decrement('like', 1);
            Post::find($post)->decrement('like', 1);
            //$dec->like = $dec->like - 1;
            //dd($dec->like);
            //$dec->save();
            //PostUser::destroy($like);
            $like->delete();
            //dd($dec->like);
            //$user->likedPosts()->detach($post);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function dislikePost(Request $request, $post)
    {
        //Check if user already liked the post or not->attach($post)
        $user = Auth::user();
        $likePost = Dislike::where(['post_id' => $post, 'user_id' => $user->id ])->count();
        //$likePost = $user->likedPosts()->where('post_id', $post)->count();
        //dd($likePost);
        if($likePost == 0){
            $like = new Dislike();
            $like->user_id = $request->user()->id;
            $like->post_id = $request->id;
            $like->save();
            //$user->likedPosts()->attach($post);
            /*$user->likedPosts()->create([
                'post_id' => $request->id,
                'user_id' => $request->user()->id ]);*/
        }else{
            $like = Dislike::where(['post_id' => $post, 'user_id' => $user->id ]);
            //$dec = Post::find($post)->decrement('like', 1);
            Post::find($post)->decrement('dislike', 1);
            //$dec->like = $dec->like - 1;
            //dd($dec->like);
            //$dec->save();
            //PostUser::destroy($like);
            $like->delete();
            //dd($dec->like);
            //$user->likedPosts()->detach($post);
        }
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::with('comments')->findOrFail($id);
        /*$mostComments = Post::with('comments')
        ->withCount('comments')
        ->orderBy('comments_count', 'desc')
        ->take(2)
        ->get();
        dd($mostComments);*/
        //$mostComments = Post::withCount('comments')->orderBy('comments_count', 'desc');->orderBy('desc')
        //$comm = Comment::max('commentable_id');
        /*$comm = DB::collection('comments')
                ->select(DB::raw('commentable_id'), DB::raw('count(*) as count'))
                ->groupBy('commentable_id')
                ->orderBy('count', 'desc')
                ->take(2)
                ->get();*/
        //$comm = Comment::query()->count('commentable_id')->max('commentable_id')->get();
        $mostPostliked = Post::orderBy('like', 'desc')->take(1)->first();
        $mostPostdisliked = Post::orderBy('dislike', 'desc')->take(1)->first();
        //dd($mostPostliked);
        //$mostComments = Post::with('comments')->find($comm)->first();
        //dd($comm);
        //dd($mostComments);
        $likes = PostUser::where('post_id' , $id)->get();
        $dislikes = Dislike::where('post_id' , $id)->get();
        return view('posts.show',compact('post', 'mostPostliked', 'mostPostdisliked', 'likes', 'dislikes'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  
        $post = Post::query()->find($id);
        $this->authorize("update", $post);
        return view('posts.edit')->with('post', $post);
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
        $this->validate($request, [
            'title' => 'required|min:3|max:50',
            'content' => 'required|min:3|max:100',
            'url' => 'required'
        ]);
        //Modifier un news
        $post = Post::findOrFail($id);
        $this->authorize("update", $post);
        $post->title = $request->input('title');
        $post->url = $request->input('url');
        $post->content = $request->input('content');
        $post->user_id = auth()->user()->id;
        
        $post->save();
        $request->session()->flash('status', 'News a été modifier');
        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $this->authorize("delete", $post);
        Comment::where('post_id', $id)->delete();
        PostUser::where('post_id',$id)->delete();
        Dislike::where('post_id',$id)->delete();
        $post->delete();
        //Post::destroy($id);
        $request->session()->flash('status', 'News à été supprimer');
        return redirect()->route('posts.index');
    }
}

<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Post;
use App\Comment;
use http\Env\Response;
use Validator;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    public function index()
    {
        $posts = Post::with('user')->latest();

        if($month = request('month'))
            $posts->whereMonth('created_at', Carbon::parse($month)->month);

        if($year = request('year'))
            $posts->whereYear('created_at', Carbon::parse($year)->year);

        if($author = request('author')){
            $posts = Post::getPostsByAuthor($author);
//            return view('posts.index', compact('posts'));
            return response()->json($posts);

        }

        $posts = $posts->get();

//        return view('posts.index', compact('posts'));
//        dd($posts);
        return response()->json($posts);

    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
//        $this->validate(request(), [
//            'title' => 'required|max:15',
//            'body' => 'required'
//        ]);

        $post = new Post;

//        if(is_null(auth()->id())){
//            $post->user_id = 1;
//        }
//        else $post->user_id = auth()->id();
        $post->user_id = 1;
        $post->title = request()->title;
        $post->body = request()->body;
        $post->save();
        return redirect('/posts');
    }

    public function show($id)
    {
//        return view('posts.show', compact('post'));

        $currentPost = Post::find($id);

        //dd($currentPost);

        return response()->json($currentPost);
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    public function update($id)
    {
        $post = Post::find($id);

        $post->title = request()->title;
        $post->body = request()->body;

        $post->save();

        return redirect('/posts');
    }

    public function destroy($id)
    {
       $post = Post::find($id);

       $comments = Comment::where('post_id', $id)->get();

       if($comments->isNotEmpty()){
           foreach($comments as $comment){
               $comment->delete();
           }
       }

       $post->delete();
       return redirect('/posts');
    }

    public function addComment(Post $post)
    {
        $this->validate(request(),[
            'body' => 'required|min:5'
        ]);

        $comment = new Comment;

        $comment->user_id = auth()->id();
        $comment->body = request('body');
        $comment->post_id = $post->id;

        $comment->save();

        return back();
    }


}

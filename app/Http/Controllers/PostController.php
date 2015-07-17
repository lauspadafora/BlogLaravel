<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use App\Posts;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Posts::where('active', 1)->orderBy('created_at','desc')->get();    
        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(Request $request)
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $post = new Posts();
        
        $post->title = $request->get('title');
        $post->body = $request->get('body');
        $post->slug = str_slug($post->title);
        $post->author_id = $request->user()->id;
        $post->active = 1;
       
        $post->save();
        return redirect('posts/index');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($slug)
    {
        $post = Posts::where('slug',$slug)->first();
 
        if(!$post)
        {
           return redirect('/')->withErrors('requested page not found');
        }

        $comments = $post->comments->sortByDesc('created_at');
        return view('posts.show')->withPost($post)->withComments($comments);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit(Request $request, $slug)
    {
        $post = Posts::where('slug',$slug)->first();
        return view('posts.edit')->with('post', $post);  
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request)
    {
        $post_id = $request->input('post_id');
        $post = Posts::find($post_id);       
        $title = $request->input('title');
        $slug = str_slug($title);
        $duplicate = Posts::where('slug',$slug)->first();
        
        if($duplicate)
        {
            if($duplicate->id != $post_id)
            {
                return redirect('edit/'.$post->slug)->withErrors('Title already exists.')->withInput();
            }
            else 
            {
                $post->slug = $slug;
            }
        }
      
        $post->title = $title;
        $post->body = $request->input('body');
        $post->active = 1;
        
        $post->save(); 
        return view('posts.show')->withPost($post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $post = Posts::find($id);
        
        if($post && ($post->author_id == Auth::user()->id || Auth::user()->hasRole('Admin')))
        {
          $post->active = 0;
          $post->save();
        }
        
        return redirect('posts/index');
    }
}

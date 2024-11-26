<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $posts = Post::leftJoin('categories', 'posts.category_id', 'categories.id')
        ->select('posts.*', 'categories.name as category_name')
        ->selectRaw("CASE 
                        WHEN posts.posted = 'yes' THEN 'Si'
                        WHEN posts.posted = 'no' THEN 'No'
                        END AS publicado
                        ")
        ->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $post = new Post();
        $categories = Category::get();
        return view('dashboard.posts.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        //
        //var_dump($request);
        //echo($request);
        //dd($request->validated());
        //Post::create($request->validated());
        $post = $request->validated();
        /*if($post['posted'] == 'on')
            $post['posted'] = 'yes';
        else
            $post['posted'] = 'no';*/
        if(isset($post['posted']))
            $post['posted'] = 'yes';
        Post::create($post);
        return back()->with('status', 'La publicacion se ha creado con exito');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        dd("Show");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
        //dd($post);
        $categories = Category::get();
        return view('dashboard.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePostRequest $request, Post $post)
    {
        //
        $data = $request->validated();
        /*if(isset($data['posted'])){
        if($data['posted'] == 'on')
            $data['posted'] = 'yes';
        else
            $data['posted'] = 'no';
        }else
            $data['posted'] = 'no';*/

        if(isset($data['posted']))
           $data['posted'] = 'yes';
        else
            $data['posted'] = 'no';

        $post->update($data);
        //Post::where('id', $post->id)
        //    ->update($data);
        return back()->with('status', 'La publicacion se ha actualizado con exito');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //dd($post);
        $post->delete();
        return back()->with('status', 'La publicacion se ha borrado con exito');
        //como usar modal, como pasarle valores a un modal
    }
}

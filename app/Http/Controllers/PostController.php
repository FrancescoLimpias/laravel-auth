<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post = null)
    {
        return view("admin.post_editor", [
            "active" => $post,
            "posts" => Post::all()->sortBy("updated_at", null, true)
        ]);
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
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {

        // Store image
        $data = $request->all();
        $imgPath = Storage::put('uploads', $data["img"]);
        $data["img"] = $imgPath;

        // Create new post
        $newPost = Post::create($data);
        return redirect()->route("admin.post_editor.index", $newPost->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("public.show", compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostRequest $request, Post $post)
    {

        // Store the new image
        $data = $request->all();
        $imgPath = Storage::put("uploads", $data["img"]);
        $data["img"] = $imgPath;

        // Delete old image
        if(Storage::exists($post["img"])){
            Storage::delete($post["img"]);
        }

        // Update post
        $post->update($data);

        return redirect()->route("admin.post_editor.index", $post);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        // var_dump($post); die();
        // Post::destroy($post->id);
        $post->delete();
        return redirect()->route("admin.post_editor.index");
    }
}

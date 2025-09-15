<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(8);
        return view('posts.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function store()
    {
        $user = request()->user();
        if (!$user) {
            return redirect("/");
        };
        
        request()->validate([
            'title' => 'required|max:255',
            'image' => 'required|url',
            'content' => 'required',
            'tags' => 'required',
        ]);

        $post = Post::create([
            'title' => request('title'),
            'img' => request('image'),
            'content' => request('content'),
            'user_id' => $user->id,
        ]);

        $tags = array_map('trim', explode(',', request('tags')));
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tag = \App\Models\Tag::firstOrCreate(['name' => trim($tagName)]);
            $tagIds[] = $tag->id;
        }

        $post->tags()->sync($tagIds);
        return redirect('/blog');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post
        ]);
    }

    public function update(Post $post)
    {
        $post->update([
            'title' => request('title'),
            'img' => request('image'),
            'content' => request('content'),
            'user_id' => 1,
        ]);

        $tags = array_map('trim', explode(',', request('tags')));
        $tagIds = [];

        foreach ($tags as $tagName) {
            $tag = \App\Models\Tag::firstOrCreate(['name' => trim($tagName)]);
            $tagIds[] = $tag->id;
        }

        $post->tags()->sync($tagIds);
        return redirect('/blog/' . $post->id);
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return redirect('/blog');
    }
}

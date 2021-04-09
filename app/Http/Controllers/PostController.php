<?php

namespace App\Http\Controllers;

use App\Models\Post
use App\Models\Todo;use Illuminate\Http\Request;

class PostController extends Controller
{
    // show all posts
    public function index()
    {
        $Post = Post::all()->toArray();
        return array_reverse($Post);
    }
// create post
    public function store(Request $request)
    {
        $validator = Validator::make ($request->all(), [
            'title'=> 'required|string',
            'content'=> 'required',
            'slug' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => false,
                    'errors' => $validator->errors(),
                ],
                400
            );
        }

        $Post = new Post();
        $Post->title = $request->title;
        $Post->content = $request->content;
        $Post->slug = $request->slug;
        $Post->status = $request->status['true'];

        if ($this->user->Post()->save($Post)) {
            return response()->json(
                [
                    'status' => true,
                    'post' => $Post,
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => false,
                    'message' => 'the post could not be saved.',
                ]
            );
        }

    }

    // show single post

    public function show($id)
    {
        $Post = Post::find($id);
        return response()->json($Post);
    }
// delete post
    public function update($id, Request $request)
    {
        $Post = Post::find($id);
        $Post->update($request->all());

        return response()->json('Post updated!');
    }

    public function destroy($id)
    {
        $Post = Post::find($id);
        $Post->delete();

        return response()->json('Post deleted!');
    }
}

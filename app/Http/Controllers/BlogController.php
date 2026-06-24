<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{


    // index
    public function index()
    {
        // return response()->json(['message' => 'Welcome to the Blog API!', 'status' => 'success'], 205)
        //     ->header('masud', 'haka')
        //     ->header('test', 'test value');
        // ->setStatusCode(201);

        $posts = Post::all();
        return response()->json(['message' => 'Blog posts retrieved successfully!', 'status' => 'success', "data" => $posts], 200);
    }


    // store
    public function store(StorePostRequest $request)
    {

        // validate the request data
        $request->validate([
            'title' => 'required|string|min:2|max:255',
            'body' => 'required|string|min:2|max:1000',
        ]);

        // $data = $request->all();
        $data = $request->only(['title', "body"]);
        $data['author_id'] = 1; // set the author_id to 1 for now

        return $data;

        $crateData = Post::create($data);
        return response()->json([
            'message' => 'Blog post created successfully!',
            'status' => 'success',
            "data" => $crateData
        ], 201);
    }


    // show single blog post

    public function show(string $id)
    {
        return response()->json(['message' => 'Blog post found!', 'status' => 'success', "data" => ["id" => $id]]);
    }



    // update blog post
    public function update(Request $request, string $id)
    {

        $request->validate([
            'title' => 'required|string|min:2|max:255',
            'body' => 'required|string|min:2|max:1000',
            "id" => 'nullable|integer'
        ]);
        return response()->json(['message' => 'Blog post updated successfully!', 'status' => 'success', "data" => ["id" => $id]]);
    }



    // delete blog post
    public function destroy(string $id)
    {
        return response()->json(['message' => 'Blog post deleted successfully!', 'status' => 'success', "data" => ["id" => $id]]);
    }
}

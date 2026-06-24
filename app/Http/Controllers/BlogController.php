<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{


    // index
    public function index()
    {
        return response()->json(['message' => 'Welcome to the Blog API!', 'status' => 'success'], 205)
            ->header('masud', 'haka')
            ->header('test', 'test value');
        // ->setStatusCode(201);
    }


    // store
    public function store(Request $request)
    {

        // validate the request data
        $request->validate([
            'title' => 'required|string|min:2|max:255',
            'body' => 'required|string|min:2|max:1000',
            "id" => 'nullable|integer'
        ]);

        // $data = $request->all();
        $data = $request->only(['title', "body"]);
        return response()->json([
            [
                "id" => $data['id'] ?? 1,
                "title" => $data['title'] ?? "Default Title",
                "body" => $data['body'] ?? "Default Body"
            ]
        ]);
    }


    // show single blog post

    public function show(string $id)
    {
        return response()->json(['message' => 'Blog post found!', 'status' => 'success', "data" => ["id" => $id]]);
    }



    // update blog post
    public function update(Request $request, string $id)
    {
        return response()->json(['message' => 'Blog post updated successfully!', 'status' => 'success', "data" => ["id" => $id]]);
    }



    // delete blog post
    public function destroy(string $id)
    {
        return response()->json(['message' => 'Blog post deleted successfully!', 'status' => 'success', "data" => ["id" => $id]]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use App\Http\Requests\UpdateCommentRequest;

class CommentController extends Controller
{
    //insert data to the table
    public function create(CommentRequest $request){

        //create category variable towards the data
        $comments = Comment::create($request->validated());

        return response()->json(['message'=>'Comment Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $comments = Comment::all();
        return response()->json(['comments'=>$comments],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $comments = Comment::find($id);
        if($comments)
        {
            return response()->json(['comments' => $comments], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Comment Found'],404);
        }
    }

    //update data
    public function update(UpdateCommentRequest $request,$id)
    {
        $comments = Comment ::find($id);
        if($comments)
        {
            //create comment variable towards the data
            $comments = Comment::update($request->validated());

            return response()->json(['message' => 'Comment Updated Successfully'], 200); //return response
        }

    }

    //delete data
    public function delete($id)
    {
        $comments = Comment::find($id);
        if($comments)
        {
            $comments->delete();
            return response()->json(['message' => 'Comment deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Comment Not found'], 200); //return response
        }

    }
}

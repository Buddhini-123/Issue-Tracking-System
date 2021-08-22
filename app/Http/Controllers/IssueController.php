<?php

namespace App\Http\Controllers;

use App\Models\Issue;
use App\Models\comment;
use Illuminate\Http\Request;
use App\Http\Requests\IssueRequest;
use App\Http\Requests\UpdateIssueRequest;

class IssueController extends Controller
{

    //insert data to the table
    public function create(IssueRequest $request){
        //create category variable towards the data
        $issues = Issue::create($request->validated());

        return response()->json(['message'=>'Issue Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $issues = Issue::all();
        return response()->json(['issues'=>$issues],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $issues = Issue::find($id);
        if($issues)
        {
            return response()->json(['issues' => $issues], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Issue Found'],404);
        }
    }

    //update data
    public function update(UpdateIssueRequest $request,$id)
    {
        $issues = Issue::find($id);

        if($issues)
        {
            //create issues variable towards the data
            $issues = Issue::update($request->validated());

            return response()->json(['message' => 'Issue Updated Successfully'], 200); //return response
        }

    }

    //delete data
    public function delete($id)
    {
        $issues = Issue::find($id);
        if($issues)
        {
            $issues->delete();
            return response()->json(['message' => 'Issue deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Issue Not found'], 200); //return response
        }

    }

    //one to many relationship with comments
    public function displayComments($id)
    {
        return Issue::find($id)->comments;
    }

    //one to many relationship with subcategories
    public function displayImages($id)
    {
        return Issue::find($id)->images;
    }




}

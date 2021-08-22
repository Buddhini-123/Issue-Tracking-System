<?php

namespace App\Http\Controllers;

use App\Models\IssueCategory;
use Illuminate\Http\Request;
use App\Http\Requests\IssueCategoryRequest;
use App\Http\Requests\UpdateIssueCategoryRequest;

class IssueCategoryController extends Controller
{
    //insert data to the table
    public function create(IssueCategoryRequest $request){

        //create category variable towards the data
        $issue_categories = IssueCategory::create($request->validated());
        return response()->json(['message'=>'Issue Category Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $issue_categories = IssueCategory::all();
        return response()->json(['issue_categories'=>$issue_categories],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $issue_categories = IssueCategory::find($id);
        if($issue_categories)
        {
            return response()->json(['issue_categories' => $issue_categories], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Issue Category Found'],404);
        }
    }

    //update data
    public function update(UpdateIssueCategoryRequest $request,$id)
    {
        $issue_categories = IssueCategory::find($id);

        if($issue_categories)
        {
            //create issue category variable towards the data
            $issue_categories = IssueCategory::update($request->validated());

            return response()->json(['message' => 'IssueCategory Updated Successfully'], 200); //return response
        }

    }

    //delete data
    public function delete($id)
    {
        $issue_categories = IssueCategory::find($id);
        if($issue_categories)
        {
            $issue_categories->delete();
            return response()->json(['message' => ' Issue Category deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Issue Category Not found'], 200); //return response
        }

    }

}

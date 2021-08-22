<?php

namespace App\Http\Controllers;

use App\Models\IssueSubcategory;
use Illuminate\Http\Request;
use App\Http\Requests\IssueSubcategoryRequest;
use App\Http\Requests\UpdateIssueSubcategoryRequest;

class IssueSubcategoryController extends Controller
{
    //insert data to the table
    public function create(IssueSubcategoryRequest $request){

        //create category variable towards the data
        $issue_subcategories = IssueSubcategory::create($request->validated());

        return response()->json(['message'=>'Issue Subcategory Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $issue_subcategories = IssueSubcategory::all();
        return response()->json(['categories'=>$issue_subcategories],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $issue_subcategories = IssueSubcategory::find($id);
        if($issue_subcategories)
        {
            return response()->json(['categories' => $issue_subcategories], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Issue Subcategory Found'],404);
        }
    }

    //update data
    public function update(UpdateIssueSubcategoryRequest $request,$id)
    {
        $issue_subcategories = IssueSubcategory::find($id);

        if($issue_subcategories)
        {
            //create issue subcategories variable towards the data
            $issue_subcategories = IssueSubcategory::update($request->validated());

            return response()->json(['message' => 'Issuesubcategory Updated Successfully'], 200); //return response
        }

    }

    //delete data
    public function delete($id)
    {
        $issue_subcategories = IssueSubcategory::find($id);
        if($issue_subcategories)
        {
            $issue_subcategories->delete();
            return response()->json(['message' => 'Issue Subcategory deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Issue Subcategory Not found'], 200); //return response
        }

    }
}

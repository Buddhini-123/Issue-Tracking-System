<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\SubcategoryRequest;
use App\Http\Requests\UpdateSubcategoryRequest;

class SubcategoryController extends Controller
{



    //insert data to the table
    public function create(SubcategoryRequest $request){
        //create category variable towards the data
        $subcategories = Subcategory::create($request->validated());

        return response()->json(['message'=>'Subcategory Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $subcategories = Subcategory::all();
        return response()->json(['categories'=>$subcategories],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $subcategories = Subcategory::find($id);
        if($subcategories)
        {
            return response()->json(['subcategories' => $subcategories], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Category Found'],404);
        }
    }

    //update data
    public function update(UpdateSubcategoryRequest $request,$id)
    {
        $subcategories = Subcategory::find($id);

        if($subcategories)
        {
            //create subcategories variable towards the data
            $subcategories = Subcategory::update($request->validated());

            return response()->json(['message' => 'subcategory Updated Successfully'], 200); //return response
        }

    }

    //delete data
    public function delete($id)
    {
        $subcategories = Subcategory::find($id);
        if($subcategories)
        {
            $subcategories->delete();
            return response()->json(['message' => 'Subcategory deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Subcategory Not found'], 200); //return response
        }

    }

    /**
     * The issues that belong to the subcategory.
     */
    public function issues()
    {
        return $this->belongsToMany(Issue::class);
    }

    public function displayIssueSubcategory($id)
    {
        $subcategory = Subcategory::find($id);

        return $subcategory;
    }


}

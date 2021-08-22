<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{

    //insert data to the table
    public function create(CategoryRequest $request){

        //create category variable towards the data
        $categories = Category::create($request->validated());

        return response()->json(['message'=>'Category Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $categories = Category::all();
        return response()->json(['categories'=>$categories],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $categories = Category::find($id);
        if($categories)
        {
            return response()->json(['categories' => $categories], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Category Found'],404);
        }
    }

    //update data
    public function update(UpdateCategoryRequest $request,$id)
    {
        $categories = Category ::find($id);

        if($categories)
        {
            //create category variable towards the data
            $categories = Category::update($request->validated());

            return response()->json(['message' => 'Category Updated Successfully'], 200); //return response
        }

    }

    //delete data
    public function delete($id)
    {
        $categories = Category::find($id);
        if($categories)
        {
            $categories->delete();
            return response()->json(['message' => 'Category deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Category Not found'], 200); //return response
        }

    }

    //one to many relationship with subcategories
    public function displayCategories($id)
    {
        return Category::find($id)->subcategories;
    }
    //many to many relationship with subcategories
    public function displayIssueCategory($id)
    {
        $category = Category::find($id);

        return $category;
    }

}

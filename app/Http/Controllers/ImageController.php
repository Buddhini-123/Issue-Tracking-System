<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Http\Requests\UpdateImageRequest;


class ImageController extends Controller
{
    //insert data to the table
    public function create(ImageRequest $request){

        //create category variable towards the data
        $images = Image::create($request->validated());
        return response()->json(['message'=>'Image Added Successfully'],200); //return response
    }

    //Retrieve added data
    public function index()
    {
        $images = Image::all();
        return response()->json(['images'=>$images],200);
    }

    //Retrieve added data using the specific id
    public function show($id)
    {
        $images = Image::find($id);
        if($images)
        {
            return response()->json(['images' => $images], 200);
        }
        //if the id not found
        else
        {
            return response()->json(['message'=>'No Image Found'],404);
        }
    }

    //update data
    public function update(UpdateImageRequest $request,$id)
    {
        $images = Image::find($id);

        if($images)
        {
            //create image variable towards the data
            $images = Image::update($request->validated());

            return response()->json(['message' => 'Image Updated Successfully'], 200); //return response
        }

    }


    //delete data
    public function delete($id)
    {
        $images = Image::find($id);
        if($images)
        {
            $images->delete();
            return response()->json(['message' => 'Image deleted successfully'], 200); //return response
        }
        else
        {
            return response()->json(['message' => 'Image Not found'], 200); //return response
        }

    }
}

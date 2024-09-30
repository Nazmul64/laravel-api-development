<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dollarcategorie;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function Addcategory(Request $request){
        if($request->isMethod('post')){
            $data=$request->all();
        }

       $category= new Dollarcategorie;
       $category->category_name=$data['category_name'];
       $message="category Successfully Added";
       $category->save();
       return response()->json(['message'=>$message],422);
    }
}

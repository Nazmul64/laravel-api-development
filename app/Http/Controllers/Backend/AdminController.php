<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.index');
    }
    public function show(){
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        return view('brand.show',compact('brands'));
    }
    public function add_brand(){
        return view('brand.brand-add');
    }
    public function brand_store(Request $request){
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:brands,slug',
            'image' => 'mimes:png,jpg,jpeg|max:2024',
        ]);
        $brand = Brand::new();
       $brand->name=$request->name;
       $brand->slug=str::slug($request->name);
       $image=$request->file('image');
       $file_extention=$request->file('image')->extension();
       $file_name=Carbon::now().'.'. $file_extention;
       $this->GenerateBrandthumbails($image,$file_name);
       $brand->image=$file_name;
       $brand->save();
       return redirect()->route('success','Brand has been added successfully!');

    }

    public function GenerateBrandthumbails($image,$imageName){
        $image_location=public_path('upload/brand');
        $img=Image::read($image->path());
        $img->cover(124,124,"top");
        $img->resize(124,124,function($constraint){
            $constraint->aspectRation();
        })->save( $image_location.'/'.$imageName);
    }
}

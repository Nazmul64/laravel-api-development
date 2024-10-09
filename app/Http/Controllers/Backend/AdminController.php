<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(){
        return view('admin.index');
    }
    public function brands(){
        $brands=Brand::orderBy('id','DESC')->paginate(10);
        return view('brand.brand',compact('brands'));
    }
    public function add_brand(){
        return view('brand.brand-add');
    }
}

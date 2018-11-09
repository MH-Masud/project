<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Manufacture;
use DB;
use App\SubCategory;
use App\Category;

class BrandController extends Controller
{
    public function show($id){

    	// $productsByManufactureId = Product::where('manufactureId',$id)
    	//                             ->where('publicationStatus',1)
    	//                             ->get();

        $productsByManufactureId = DB::table('products')
                                 ->where('manufactureId',$id)
                                 ->where('publicationStatus',1)
                                 ->paginate(4);
        // echo "<pre>";
        // print_r($productsByManufactureId);
        // exit();

    	$manufacturesById = Manufacture::where('id',$id)->first();

    	return view('frontEnd.brand.brandContent',compact('productsByManufactureId','manufacturesById'));
    }

    public function means(){

        $categories = Category::all();

        return view('frontEnd.brand.means',compact('categories'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\SubCategory;
use DB;


class SubCategoryController extends Controller
{
    public function createSubCategory(){

        $categories = Category::where('categoryStatus',1)->get();

        $manufactures = Manufacture::where('manufactureStatus',1)->get();

    	return view('admin.subcategory.createSubCategory',compact('categories','manufactures'));
    }

    public function storeSubCategory (Request $request){

    	$this->validate($request,[

              'subCategoryName'=>'required',
              'subCategoryDescription'=>'required',
    	]);


    	$subcategory = new SubCategory();
    	$subcategory->subCategoryName  = $request->subCategoryName;
    	$subcategory->categoryId = $request->categoryId;
    	$subcategory->manufactureId = $request->manufactureId;
    	$subcategory->subCategoryDescription = $request->subCategoryDescription;
    	$subcategory->subCategoryStatus = $request->subCategoryStatus;
    	$subcategory->save();

    	return redirect('/sub-category/add')->with('message','Sub Category Info Save Successfull');
    }

    public function mangeSubCategory (){

    	// $allSubcategories = SubCategory::paginate(4);

    	$allSubcategories = DB::table('sub_categories')
    	                  ->join('categories','sub_categories.categoryId','=','categories.id')
    	                  ->join('manufactures','sub_categories.manufactureId','=','manufactures.id')
    	                  ->select('sub_categories.*','categories.categoryName','manufactures.manufactureName')
    	                  ->paginate(4);

    	// echo "<pre>";
    	// print_r($allSubcategories);
    	// exit();

    	return view('admin.subcategory.mangeSubCategory',compact('allSubcategories'));
    }
}

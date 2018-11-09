<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use DB;
class CategoryController extends Controller
{
    public function createCategory(){

    	return view('admin.category.createCategory');
    }

    public function storeCategory(Request $request){

        $this->validate($request,[
                  
            'categoryName' => 'required',
            'categoryDescription' => 'required',

        ]);

    	// return $request->all();

    	// $category = new Category();
    	// $category->categoryName = $request->categoryName;
    	// $category->categoryDescription = $request->categoryDescription;
    	// $category->categoryStatus = $request->categoryStatus;
    	// $category->save();
    	// return "Save SuccessFull";

    	// Category::create($request->all());
    	// return "Saved";

           DB::table('categories')->insert([
                'categoryName' => $request->categoryName,
                'categoryDescription'=> $request->categoryDescription,
                'categoryStatus' => $request->categoryStatus,
           ]);

           return redirect('/category/add')->with('message','Category Info Successfully Saved !');
    	

    }

    public function mangeCategory(){

    	$categories = Category::all();

    	return view('admin.category.mangeCategory',compact('categories'));
    }

    public function editCategory($id){
        
        $categoryById = Category::where('id', $id)->first();
        return view('admin.category.editCategory',compact('categoryById'));
    }

    public function updateCategory(Request $request){

        // dd($request->all());

        $category = Category::find($request->id);
        $category->categoryName = $request->categoryName;
        $category->categoryDescription = $request->categoryDescription;
        $category->categoryStatus = $request->categoryStatus;
        $category->save();

        return redirect('/category/manage')->with('message','Category Info Update Successfull');
    }

    public function deleteCategory($id){

        $category = Category::find($id);
        $category->delete();

        return redirect('/category/manage')->with('message','Category Info Delete Successfull');
    }
}

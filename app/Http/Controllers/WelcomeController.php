<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use DB;
use App\SubCategory;


class WelcomeController extends Controller
{
    public function index(){

        // $publishedProducts = Product::where('publicationStatus' ,1)->get();
            
            // return $publishedProducts;
        $publishedProducts = DB::table('products')
                                        ->where('publicationStatus', 1)
                                        ->latest()
                                        ->limit(12)
                                        ->get();

        $publishedProductsInRandomOrder = DB::table('products')
                                         ->where('publicationStatus',1)
                                         ->limit(12)
                                         ->inRandomOrder()
                                         ->get();

        $publishedProductsBySpecialOffer = DB::table('products')
                                         ->where('publicationStatus',1)
                                         ->where('specialOffer',1)
                                         ->get();

        return view('frontEnd.home.homeContent',compact('publishedProducts','publishedProductsInRandomOrder','publishedProductsBySpecialOffer'));
    }

    public function category($c_id,$s_id){
        
        $publishedProductsByCategoryId = Product::where('categoryId', $c_id)
                                                ->where('publicationStatus', 1)
                                                ->paginate(2);

                                 $categoryById = DB::table('categories')
                                               ->where('id',$c_id)
                                               ->first();

           $latestPublishedProductsByCategoryId = DB::table('products')
                                                ->where('categoryId',$c_id)
                                                ->where('publicationStatus',1)
                                                ->limit(3)
                                                ->get();

    $inRandomOrderPublishedProductsByCategoryId = DB::table('products')
                                                ->where('publicationStatus',1)
                                                ->where('categoryId',$c_id)
                                                ->get();

     $productsBySubcategoryIdUnderCategoryId = DB::table('products')
                                                 ->where('subCategoryId',$s_id)
                                                 ->where('categoryId',$c_id)
                                                 ->paginate(8);

         $subcategoryById= SubCategory::where('id',$s_id)->first();
         $categoryById= Category::where('id',$c_id)->first();

    	return view('frontEnd.category.categoryContent',compact('latestPublishedProductsByCategoryId','categoryById','inRandomOrderPublishedProductsByCategoryId','publishedProductsByCategoryId','productsBySubcategoryIdUnderCategoryId','subcategoryById','categoryById'));
    }

    public function contact(){

    	return view('frontEnd.contact.contactContent');
    }

    public function details($id){
        
        $productById = Product::where('id', $id)->first();
    	return view('frontEnd.product_details.details',compact('productById'));
    }

   
    public function showAllSubCategory($c_id,$s_id){

        

         // echo "<pre>";
         // print_r($productsBySubcategoryIdUnderCategoryId);
         // exit();

          return view('frontEnd.subcategory.showAllSubCategoryUndercategoryId',compact('productsBySubcategoryIdUnderCategoryId','subcategoryById','categoryById'));
    }
    

}

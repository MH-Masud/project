<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Manufacture;
use App\Product;
use DB;
use App\SubCategory;

class ProductController extends Controller
{
    public function createProduct(){

    	$categories = Category::where('categoryStatus', 1)->get();
      $manufactures = Manufacture::where('manufactureStatus', 1)->get();
      $subcategorys = SubCategory::where('subcategoryStatus',1)->get();
    	return view('admin.product.createProduct',compact('categories','manufactures','subcategorys'));
    }

    public function storeProduct(Request $request){

    	$this->validate($request,[
              
              'productName'=>'required',
              'productPrice'=>'required',
              'productQuantity'=>'required',
              'productImage'=>'required',

    	]);

    	$productimage = $request->file('productImage');

    	$imageName=$productimage->getClientOriginalName();
      $uploadPath='public/productImage/';
    	$productimage->move($uploadPath,$imageName);
    	$imageUrl=$uploadPath.$imageName;
        $this->saveProductInfo($request,$imageUrl);
        return redirect('/product/add')->with('message','Product Info Save Fuccessfully');    	
    }

    protected function saveProductInfo($request,$imageUrl){

    	$product = new Product();
    	$product->productName = $request->productName;
    	$product->categoryId = $request->categoryId;
      $product->subCategoryId=$request->subCategoryId;
    	$product->manufactureId = $request->manufactureId;
    	$product->productPrice = $request->productPrice;
    	$product->productQuantity = $request->productQuantity;
    	$product->productShortDescription  = $request->productShortDescription;
    	$product->productLongDescription = $request->productLongDescription;
    	$product->productImage = $imageUrl;
      $product->specialOffer = $request->specialOffer;
    	$product->publicationStatus = $request->publicationStatus;
    	$product->save();
    }

    public function manageProduct(){

        $productsInfo = DB::table('products')
                          ->join('categories','products.categoryId','=','categories.id')
                          ->join('manufactures','products.manufactureId','=','manufactures.id')
                          ->select('products.id','products.productName','products.productPrice','products.productQuantity','products.publicationStatus','categories.categoryName','manufactures.manufactureName')
                          ->paginate(8);
        
        return view('admin.product.manageProduct',compact('productsInfo'));
    }

    public function viewProduct($id){

        $productInfoById = DB::table('products')
                          ->join('categories','products.categoryId','=','categories.id')
                          ->join('manufactures','products.manufactureId','=','manufactures.id')
                          ->select('products.*','categories.categoryName','manufactures.manufactureName')
                          ->where('products.id', $id)
                          ->first();

        // echo "<pre>";
        // print_r($productsInfo);
        // exit();
        return view('admin.product.viewProduct',compact('productInfoById'));
    }

    public function editProduct($id){

        $productById = Product::where('id', $id)->first();
        $categories = Category::where('categoryStatus', 1)->get();
        $manufactures = Manufacture::where('manufactureStatus', 1)->get();
        return view('admin.product.editProduct',compact('productById','categories','manufactures'));
    }

    public function updateProduct(Request $request){
      
      $productById = Product::find($request->productId);
      $imageUrl = $this->imageExistStatus($request);
      $productById->productName = $request->productName;
      $productById->categoryId = $request->categoryId;
      $productById->manufactureId = $request->manufactureId;
      $productById->productPrice = $request->productPrice;
      $productById->productQuantity = $request->productQuantity;
      $productById->productShortDescription  = $request->productShortDescription;
      $productById->productLongDescription = $request->productLongDescription;
      $productById->productImage = $imageUrl;
      $productById->publicationStatus = $request->publicationStatus;
      $productById->save();

        return redirect('/product/manage')->with('message','Product Info Update Successfull');
        
    }

    protected function imageExistStatus($request){
        
        $productById = Product::find($request->productId);
        $productimage = $request->file('productImage');

        if ($productimage) {

           unlink($productById->productImage);
           $imageName=$productimage->getClientOriginalName();
           $uploadPath='public/productImage/';
           $productimage->move($uploadPath
            ,$imageName);
           $imageUrl=$uploadPath.$imageName;
        }
        else{
            
           $imageUrl=$productById->productImage;
        }

        return $imageUrl;
    }

    public function deleteProduct($id){

      $product = Product::find($id);
      unlink($product->productImage);
      $product->delete();

      return redirect('/product/manage')->with('message','Product Info Delete Successfull');
        
    }
}

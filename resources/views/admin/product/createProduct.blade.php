@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center">{{Session::get('message')}}</h3>
<hr>
  
        {!! Form::open(['url'=>'/product/save','method'=>'POST','class'=>'form-horizontal','name'=>'editManufactureForm','enctype'=>'multipart/form-data']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productName">Product Name</label>
                    <div class="col-lg-8">
                        <input type="text" name="productName" class="form-control">
                        <span class="text-danger">{{$errors->has('productName') ? $errors->first('productName') : ''}}</span>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="control-label col-lg-2" for="categoryId">Category Name</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="categoryId">
                            <option>Select Category Name</option>
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->categoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="subCategoryId">Sub Category Name</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="subCategoryId" required="">
                            <option value="">Select Sub Category Name</option>
                            
                            @foreach($subcategorys as $subcategory)
                            <option value="{{$subcategory->id}}">{{$subcategory->subCategoryName}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="manufactureId">Manufacture Name</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="manufactureId" required="">
                            <option value="">Select Manufacture Name</option>

                            @foreach($manufactures as $manufacture)
                            <option value="{{$manufacture->id}}">{{$manufacture->manufactureName}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Product Price</label>
                    <div class="col-lg-8">
                        <input type="number" name="productPrice" class="form-control">
                        <span class="text-danger">{{$errors->has('productPrice')  ? $errors->first('productPrice') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Product Quantity</label>
                    <div class="col-lg-8">
                        <input type="number" name="productQuantity" class="form-control">
                        <span class="text-danger">{{$errors->has('productQuantity') ? $errors->first('productQuantity') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productShortDescription">Product Short Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="productShortDescription" rows="3"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productLongDescription">Product Long Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="productLongDescription" rows="6"></textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productImage">Product Image</label>
                    <div class="col-lg-8">
                        <input type="file" name="productImage" accept="/image/*">
                        <span class="text-danger">{{$errors->has('productImage') ? $errors->first('productImage') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Special Offer</label>
                    <div class="col-lg-8">
                        <input type="radio" name="specialOffer" value="1"> Yes 
                        <input type="radio" name="specialOffer" value="0" required > No
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="publicationStatus">Publication Status</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="publicationStatus" required="">
                            <option value="">Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="2">Unpublished</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-8  col-lg-offset-2">
                        <input type="submit" name="submit" value="Save Product Information" class="btn btn-success btn-block">
                    </div>
                </div>
            {!! Form::close()!!}
 <hr>

@endsection
@extends('admin.master')

@section('content')
<hr>
<h3 class="text-center">{{Session::get('message')}}</h3>
<hr>
  <div class="container">
    <div class="row">
        {!! Form::open(['url'=>'/product/update','method'=>'POST','class'=>'form-horizontal','name'=>'editProductForm','enctype'=>'multipart/form-data']) !!}

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productName">Product Name</label>
                    <div class="col-lg-8">
                        <input type="text" value="{{$productById->productName}}" name="productName" class="form-control">
                        <span class="text-danger">{{$errors->has('productName') ? $errors->first('productName') : ''}}</span>
                        <input type="hidden" name="productId" value="{{$productById->id}}" class="form-control">
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
                    <label class="control-label col-lg-2" for="manufactureId">Manufacture Name</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="manufactureId">
                            <option>Select Manufacture Name</option>

                            @foreach($manufactures as $manufacture)
                            <option value="{{$manufacture->id}}">{{$manufacture->manufactureName}}</option>
                            @endforeach

                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Product Price</label>
                    <div class="col-lg-8">
                        <input type="number" value="{{$productById->productPrice}}" name="productPrice" class="form-control">
                        <span class="text-danger">{{$errors->has('productPrice')  ? $errors->first('productPrice') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2">Product Quantity</label>
                    <div class="col-lg-8">
                        <input type="number" value="{{$productById->productQuantity}}" name="productQuantity" class="form-control">
                        <span class="text-danger">{{$errors->has('productQuantity') ? $errors->first('productQuantity') : ''}}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productShortDescription">Product Short Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="productShortDescription" rows="3">{{$productById->productShortDescription}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productLongDescription">Product Long Description</label>
                    <div class="col-lg-8">
                        <textarea class="form-control" name="productLongDescription" rows="6">{{$productById->productLongDescription}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="productImage">Product Image</label>
                    <div class="col-lg-8">
                        <input type="file" name="productImage" accept="/image/*">
                        <span class="text-danger">{{$errors->has('productImage') ? $errors->first('productImage') : ''}}</span>
                        <img src="{{asset($productById->productImage)}}" alt="{{$productById->productName}}" height="100" width="100">
                    </div>
                </div>

                <div class="form-group">
                    <label class="control-label col-lg-2" for="publicationStatus">Publication Status</label>
                    <div class="col-lg-8">
                        <select class="form-control" name="publicationStatus">
                            <option>Select Publication Status</option>
                            <option value="1">Published</option>
                            <option value="2">Unpublished</option>
                        </select>
                    </div>
                </div>
                
                <div class="form-group">
                    <div class="col-lg-8  col-lg-offset-2">
                        <input type="submit" name="submit" value="Update Product Information" class="btn btn-success btn-block">
                    </div>
                </div>
            {!! Form::close()!!}
    </div>
</div>
<script type="text/javascript">
    document.forms['editProductForm'].elements['categoryId'].value = {{$productById->categoryId}}
    document.forms['editProductForm'].elements['manufactureId'].value = {{$productById->manufactureId}}
    document.forms['editProductForm'].elements['publicationStatus'].value = {{$productById->publicationStatus}}
</script>
@endsection
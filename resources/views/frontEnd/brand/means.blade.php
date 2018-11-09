



@foreach($categories as $category)
   
   <h2>{{$category->categoryName}} <small>Belongs to...</small>  </h2>
   
   @foreach($category->subcategories as $sub)	
   <h1>{{$sub->subCategoryName}}</h1>
@endforeach
   <p>{{$category->categoryDescription}}</p>
@endforeach
  	

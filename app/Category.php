<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['categoryName','categoryDescription','categoryStatus'];

    public function subcategories(){

    	return $this->hasMany('App\SubCategory','categoryId');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subCategoryName');
            $table->integer('categoryId')->unsigned()->index();
            $table->foreign('categoryId')->references('id')->on('categories');
            $table->integer('manufactureId')->unsigned()->index();
            $table->foreign('manufactureId')->references('id')->on('manufactures');
            $table->text('subCategoryDescription');
            $table->tinyInteger('subCategoryStatus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_categories');
    }
}

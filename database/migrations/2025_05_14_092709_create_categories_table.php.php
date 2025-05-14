<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique()->comment('Tên danh mục');
            $table->string('slug')->unique()->nullable()->comment('Slug danh mục (cho SEO)');
            $table->string('module')->nullable()->index()->comment('Module mà danh mục này thuộc về (ví dụ: image, product)');
            $table->boolean('active')->default(true)->comment('Trạng thái hoạt động của danh mục');
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
        Schema::dropIfExists('categories');
    }
}
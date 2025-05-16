<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url');
            $table->integer('order')->default(0);
            $table->unsignedBigInteger('parent_id')->nullable(); // Thêm cột parent_id, cho phép null
            $table->timestamps();

            $table->foreign('parent_id') // Tạo khóa ngoại
                  ->references('id')
                  ->on('menus')
                  ->onDelete('cascade'); // Xóa menu cha thì xóa menu con
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
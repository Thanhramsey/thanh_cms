<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
     public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('url');
            $table->string('image')->nullable(); // Đường dẫn hình ảnh, có thể null
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down()
    {
        Schema::dropIfExists('links');
    }
};
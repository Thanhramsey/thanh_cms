<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Tiêu đề video
            $table->text('description')->nullable(); // Mô tả video
            $table->string('video_path')->nullable(); // Đường dẫn đến file video upload (nếu có)
            $table->string('embed_url')->nullable(); // URL nhúng từ YouTube/Vimeo (hoặc ID)
            $table->boolean('is_published')->default(false); // Trạng thái xuất bản
            $table->integer('order')->default(0); // Thứ tự hiển thị
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
        Schema::dropIfExists('videos');
    }
};
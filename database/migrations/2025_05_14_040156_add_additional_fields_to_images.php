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
        Schema::table('images', function (Blueprint $table) {
            $table->text('description')->nullable()->comment('Mô tả ảnh');
            $table->string('group')->nullable()->comment('Nhóm ảnh');
            $table->integer('order')->nullable()->comment('Thứ tự hiển thị');
            $table->string('alt_text')->nullable()->comment('Văn bản thay thế');
            $table->boolean('active')->default(true)->comment('Trạng thái hoạt động');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('images', function (Blueprint $table) {
            $table->dropColumn(['description', 'group', 'order', 'alt_text','active']);
        });
    }
};
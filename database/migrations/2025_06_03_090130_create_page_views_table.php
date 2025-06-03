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
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->string('session_id')->nullable(); // Để theo dõi người dùng online duy nhất
            $table->string('ip_address')->nullable();
            $table->text('user_agent')->nullable();
            $table->string('url')->nullable();
            $table->date('view_date')->nullable(); // Ngày truy cập, để dễ dàng nhóm theo ngày/tuần/tháng
            $table->timestamps(); // created_at sẽ là thời điểm truy cập
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('page_views');
    }
};
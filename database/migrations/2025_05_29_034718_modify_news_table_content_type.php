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
        Schema::table('news', function (Blueprint $table) {
            $table->longText('content')->change(); // Hoặc $table->text('content')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
     public function down()
    {
        Schema::table('news', function (Blueprint $table) {
            // Nếu bạn muốn rollback, bạn có thể đổi lại kiểu dữ liệu cũ ở đây
            // Ví dụ: $table->string('content')->change();
        });
    }
};
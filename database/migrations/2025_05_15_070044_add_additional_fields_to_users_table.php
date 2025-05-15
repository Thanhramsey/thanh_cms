<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdditionalFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('avatar')->nullable()->comment('Đường dẫn avatar');
            $table->string('phone_number')->nullable()->comment('Số điện thoại');
            $table->text('address')->nullable()->comment('Địa chỉ');
            $table->tinyInteger('status')->default(1)->comment('0: inactive, 1: active');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['avatar', 'phone_number', 'address', 'status']);
        });
    }
}
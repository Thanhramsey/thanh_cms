<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('news', function (Blueprint $table) {
            if (!Schema::hasColumn('news', 'content')) {
                $table->longText('content')->nullable();
            }
            if (!Schema::hasColumn('news', 'summary')) {
                $table->text('summary')->nullable();
            }
            if (!Schema::hasColumn('news', 'user_id')) {
                $table->unsignedBigInteger('user_id')->nullable();
                $table->foreign('user_id')->references('id')->on('users')->onDelete('set null');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('news', function (Blueprint $table) {
            $table->dropForeignIfExists(['user_id']);
            $table->dropColumnIfExists(['summary', 'content', 'user_id']);
        });
    }
};
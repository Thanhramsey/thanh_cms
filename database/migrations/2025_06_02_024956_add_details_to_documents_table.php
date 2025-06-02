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
        Schema::table('documents', function (Blueprint $table) {
            if (!Schema::hasColumn('documents', 'so_van_ban')) {
                $table->string('so_van_ban')->nullable()->after('id');
            }
            if (!Schema::hasColumn('documents', 'trich_yeu')) {
                $table->text('trich_yeu')->nullable()->after('so_van_ban');
            }
            if (!Schema::hasColumn('documents', 'ngay_ban_hanh')) {
                $table->date('ngay_ban_hanh')->nullable()->after('trich_yeu');
            }
            if (!Schema::hasColumn('documents', 'co_quan_ban_hanh')) {
                $table->string('co_quan_ban_hanh')->nullable()->after('ngay_ban_hanh');
            }
            if (!Schema::hasColumn('documents', 'ghi_chu')) {
                $table->text('ghi_chu')->nullable()->after('co_quan_ban_hanh');
            }
            if (!Schema::hasColumn('documents', 'file_path')) {
                $table->string('file_path')->nullable()->after('ghi_chu');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('documents', function (Blueprint $table) {
            $columnsToDrop = ['so_van_ban', 'trich_yeu', 'ngay_ban_hanh', 'co_quan_ban_hanh', 'ghi_chu', 'file_path'];
            foreach ($columnsToDrop as $column) {
                if (Schema::hasColumn('documents', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
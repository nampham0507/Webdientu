<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Thêm các trường mới nếu chưa có
            if (!Schema::hasColumn('products', 'Category')) {
                $table->string('Category')->nullable()->after('Description');
            }
            if (!Schema::hasColumn('products', 'Brand')) {
                $table->string('Brand')->nullable()->after('Category');
            }
            if (!Schema::hasColumn('products', 'Stock')) {
                $table->integer('Stock')->default(0)->after('Brand');
            }
            if (!Schema::hasColumn('products', 'Discount')) {
                $table->integer('Discount')->default(0)->after('Stock');
            }
            if (!Schema::hasColumn('products', 'IsFeatured')) {
                $table->boolean('IsFeatured')->default(false)->after('Discount');
            }
            if (!Schema::hasColumn('products', 'ImageURL')) {
                $table->string('ImageURL')->nullable()->after('Image');
            }
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['Category', 'Brand', 'Stock', 'Discount', 'IsFeatured', 'ImageURL']);
        });
    }
};

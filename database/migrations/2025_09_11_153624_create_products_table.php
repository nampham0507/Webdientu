<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('ProductID'); // khóa chính
            $table->string('ProductName');
            $table->decimal('Price', 15, 2);
            $table->decimal('OriginalPrice', 15, 2)->nullable();
            $table->text('Description')->nullable();
            $table->string('Image')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

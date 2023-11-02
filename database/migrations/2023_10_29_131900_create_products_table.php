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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name')->collation('utf8_arabic_ci');;
            $table->string('product_code')->nullable();
            $table->foreignId('company_id')->nullable()->references('id')->on('companies')->cascadeOnDelete();
            $table->foreignId('category_id')->nullable()->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignId('product_status_id')->default(0)->references('id')->on('product_statuses')->cascadeOnDelete();
            $table->foreignId('product_accept_id')->default(0)->references('id')->on('product_accepts')->cascadeOnDelete();
            $table->text('product_image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};

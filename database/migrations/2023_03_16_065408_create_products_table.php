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
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->decimal('regular_price', 8, 2);
            $table->decimal('sale_price', 8, 2)->nullable();
            $table->string('SKU')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->enum('stock_status', ['instock', 'out_stock', 'in_stock'])->default('instock');
            $table->boolean('featured')->default(false);
            $table->unsignedInteger('quantity')->default(10);
            $table->bigInteger('category_id')->unsigned();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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

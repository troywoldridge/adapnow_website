<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Primary key, auto-incrementing
            $table->unsignedBigInteger('category_id'); // Foreign key for category
            $table->unsignedBigInteger('subcategory_id')->nullable(); // Nullable subcategory_id
            $table->string('name'); // Product name
            $table->string('slug')->unique(); // Unique slug
            $table->string('sku')->nullable()->unique(); // SKU is nullable and unique
            $table->text('description')->nullable(); // Nullable description
            $table->decimal('price', 8, 2)->default(0); // Price with default value
            $table->timestamps(); // Created_at and updated_at timestamps

            // Foreign key constraints
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade'); // Cascade on delete
            $table->foreign('subcategory_id')->references('id')->on('categories')->onDelete('set null'); // Set subcategory to null if deleted
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products'); // Drop products table
    }
}

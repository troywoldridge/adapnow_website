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
        Schema::table('product_variant', function (Blueprint $table) {
            $table->string('key')->nullable();   // Add the 'key' column
            $table->string('value')->nullable(); // Add the 'value' column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_variant', function (Blueprint $table) {
            $table->dropColumn(['key', 'value']); // Remove the columns when rolling back
        });
    }
};

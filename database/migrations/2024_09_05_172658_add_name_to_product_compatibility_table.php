<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNameToProductCompatibilityTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('product_compatibility', function (Blueprint $table) {
            $table->string('name')->nullable()->after('id'); // Add the 'name' column after 'id'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('product_compatibility', function (Blueprint $table) {
            $table->dropColumn('name'); // Remove the 'name' column on rollback
        });
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuantitiesTable extends Migration
{
    public function up()
    {
        Schema::create('quantities', function (Blueprint $table) {
            $table->id();
            $table->integer('value'); // E.g., 100, 250, 500, etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('quantities');
    }
}

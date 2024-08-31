<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHStandsTable extends Migration
{
    public function up()
    {
        Schema::create('h_stands', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // E.g., "No H-Stands", "Includes H-Stands", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('h_stands');
    }
}

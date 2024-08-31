<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGrommetsTable extends Migration
{
    public function up()
    {
        Schema::create('grommets', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // E.g., "No Grommets", "Grommets in all corners", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('grommets');
    }
}

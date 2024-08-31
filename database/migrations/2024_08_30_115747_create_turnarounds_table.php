<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTurnaroundsTable extends Migration
{
    public function up()
    {
        Schema::create('turnarounds', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // E.g., "Next Day", "2-3 Days", "5-7 Days", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('turnarounds');
    }
}

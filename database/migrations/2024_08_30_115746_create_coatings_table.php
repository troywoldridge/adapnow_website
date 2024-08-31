<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoatingsTable extends Migration
{
    public function up()
    {
        Schema::create('coatings', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // E.g., "Matte", "Glossy", "UV Coating", etc.
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coatings');
    }
}

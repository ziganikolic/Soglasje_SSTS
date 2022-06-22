<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrivolitevsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('privolitevs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('kategorija_id');     
            $table->text('privolitev_ime');
            $table->boolean('checked')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('privolitevs');
    }
}




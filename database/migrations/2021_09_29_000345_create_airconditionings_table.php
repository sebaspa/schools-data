<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAirconditioningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('airconditionings', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->integer('subtypeenergy_id');
            $table->string('potency')->nullable();
            $table->string('frigoria')->nullable();
            $table->string('mark');
            $table->string('model');
            $table->string('number_groups')->nullable();
            $table->string('types')->nullable();
            $table->text('others')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('airconditionings');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHeatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('heatings', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->integer('subtypeenergy_id');
            $table->string('number_radiators');
            $table->string('potency')->nullable();
            $table->string('model')->nullable();
            $table->string('gas')->nullable();
            $table->string('gasoil')->nullable();
            $table->string('type_boiler')->nullable();
            $table->string('tank_volume')->nullable();
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
        Schema::dropIfExists('heatings');
    }
}

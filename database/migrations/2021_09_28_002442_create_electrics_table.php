<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateElectricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('electrics', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->string('contract_type');
            $table->string('supply_number');
            $table->string('number_light_meter');
            $table->string('hired_potency');
            $table->string('total_potency');
            $table->string('general_rush');
            $table->string('number_circuits');
            $table->string('partial_squares');
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
        Schema::dropIfExists('electrics');
    }
}

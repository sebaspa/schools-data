<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSolarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('solars', function (Blueprint $table) {
            $table->id();
            $table->integer('school_id');
            $table->string('total_area');
            $table->string('number_panels');
            $table->string('installed_potency');
            $table->string('mark');
            $table->string('model');
            $table->string('energy_supplied');
            $table->string('others')->nullable();
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
        Schema::dropIfExists('solars');
    }
}

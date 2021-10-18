<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableElectricsDataNullable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('electrics', function (Blueprint $table) {
            $table->string('contract_type')->nullable()->change();
            $table->string('supply_number')->nullable()->change();  
            $table->string('number_light_meter')->nullable()->change(); 
            $table->string('hired_potency')->nullable()->change();  
            $table->string('total_potency')->nullable()->change();  
            $table->string('general_rush')->nullable()->change();   
            $table->string('number_circuits')->nullable()->change();    
            $table->string('partial_squares')->nullable()->change();    
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}

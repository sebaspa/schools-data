<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->id();
            $table->string("code", 200)->unique();
            $table->string("name", 200)->unique();
            $table->string("address", 200)->nullable();
            $table->string("district", 200)->nullable();
            $table->text("phone")->nullable();
            $table->string("fax", 50)->nullable();
            $table->text("email", 100)->nullable();
            $table->string("liable", 200)->nullable();
            $table->text("others")->nullable();
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
        Schema::dropIfExists('schools');
    }
}

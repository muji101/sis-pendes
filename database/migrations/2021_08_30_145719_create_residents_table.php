<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('residents', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('nik');
            $table->string('name');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('religion');
            $table->string('last_education');
            // $table->string('address');
            $table->string('work');
            $table->string('blood_type');
            $table->string('martial_status');
            $table->string('citizenship');

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
        Schema::dropIfExists('residents');
    }
}

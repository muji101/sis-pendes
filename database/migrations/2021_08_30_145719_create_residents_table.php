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
            
            $table->bigInteger('nik')->unique();
            $table->string('name');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->string('gender');
            $table->string('religion');
            $table->string('last_education');
            $table->string('work');
            $table->string('blood_type');
            $table->string('martial_status');
            $table->string('citizenship');
            $table->string('status')->default('ada');
            $table->string('father')->nullable();
            $table->string('mother')->nullable();

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

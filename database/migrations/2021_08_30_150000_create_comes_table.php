<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comes', function (Blueprint $table) {
            $table->id();

            $table->integer('nik');
            $table->string('name');
            $table->string('birthplace');
            $table->date('birthdate');
            $table->enum('gender', ['LK, PR']);
            $table->enum('religion', ['Islam', 'Kristen', 'Budha', 'Hindu', 'Konghucu']);
            $table->string('last_education');
            $table->string('address');
            $table->string('work');
            $table->string('blood_type');
            $table->string('martial_status');
            $table->string('citizenship');
            $table->date('arrival_date');
            $table->integer('resident_id');
            
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
        Schema::dropIfExists('comes');
    }
}

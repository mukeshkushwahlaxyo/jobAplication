<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTechnicalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('technical', function (Blueprint $table) {
            $table->integerIncrements('techId');
            $table->unsignedInteger('jobSeekerId');
            $table->string('techName')->nullable();
            $table->string('answer',1)->nullable(); //B, M, E
            $table->foreign('jobSeekerId')->references('jobSeekerId')->on('jobs_seeker')->onDelete('cascade');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('technical');
    }
}

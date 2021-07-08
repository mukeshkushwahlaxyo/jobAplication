<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExperienceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('experience', function (Blueprint $table) {
            $table->integerIncrements('experinceId');
            $table->unsignedInteger('jobSeekerId');
            $table->string('company')->nullable();
            $table->string('designation')->nullable();
            $table->date('from')->nullable();
            $table->date('to')->nullable();
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
        Schema::dropIfExists('experience');
    }
}

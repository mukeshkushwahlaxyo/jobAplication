<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('education', function (Blueprint $table) {
            $table->integerIncrements('educationId');
            $table->unsignedInteger('jobSeekerId');
            $table->string('educName')->nullable();
            $table->string('board')->nullable();
            $table->string('year',4)->nullable();
            $table->decimal('percent',7,2)->nullable();
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
        Schema::dropIfExists('education');
    }
}

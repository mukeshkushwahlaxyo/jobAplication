<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLanguageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('language', function (Blueprint $table) {
            $table->integerIncrements('languageId');
            $table->unsignedInteger('jobSeekerId');
            $table->string('langName')->nullable();
            $table->string('answer',10)->nullable(); // read, write, speak 
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
        Schema::dropIfExists('language');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobsSeekerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs_seeker', function (Blueprint $table) {
            $table->integerIncrements('jobSeekerId');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('contact',13)->nullable(); // mobile number
            $table->text('address')->nullable();
            $table->string('gender',1)->nullable(); //M, F, O
            $table->unsignedMediumInteger('city_id')->nullable();
            $table->unsignedInteger('expected_ctc')->nullable();
            $table->unsignedInteger('current_ctc')->nullable(); 
            $table->unsignedSmallInteger('notice_period')->nullable(); //In Days
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
        Schema::dropIfExists('jobs_seeker');
    }
}

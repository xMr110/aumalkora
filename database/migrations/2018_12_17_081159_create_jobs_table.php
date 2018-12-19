<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->timestamps();
        });
        Schema::create('job_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('job_id')->unsigned();
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('description')->nullable();
            $table->string('locale')->index();

            $table->unique(['job_id', 'locale']);
            $table->foreign('job_id')->references('id')->on('jobs')->onDelete('cascade');


        });



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jobs');
    }
}

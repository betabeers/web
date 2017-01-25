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
            $table->integer('user_id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->boolean('featured')->default(0);
            $table->string('email');
            $table->string('price')->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->integer('city_id')->unsigned()->nullable();
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('visits')->default(0);
            $table->string('company')->nullable();
            $table->integer('interested')->default(0);
            $table->boolean('visible')->default(1);
            $table->string('slug');
            $table->dateTime('date_featured')->nullable();
            $table->boolean('paid')->default(0);
            $table->string('url')->nullable();
            $table->integer('tweeted')->default(0);
            $table->boolean('sent_feedback')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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

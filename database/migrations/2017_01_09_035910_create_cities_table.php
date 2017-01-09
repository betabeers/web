<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('province_id')->unsigned()->nullable();
            $table->integer('country_id')->unsigned()->nullable();
            $table->string('name');
            $table->text('alternate_names')->nullable();
            $table->double('lat')->nullable();
            $table->double('lon')->nullable();
            $table->string('code', 2);
            $table->integer('population')->nulalble();
            $table->string('timezone')->nullable();
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('provinces')->onDelete('set null');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}

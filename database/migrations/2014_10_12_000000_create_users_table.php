<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('admin')->default(0);
            $table->boolean('moderator')->default(0);
            $table->string('slug');
            $table->text('body')->nullable();
            $table->string('phone', 30)->nullable();
            $table->boolean('freelance')->default(0);
            $table->boolean('visible')->default(1);
            $table->integer('karma')->default(0);
            $table->integer('votes')->default(0);
            $table->integer('visits')->default(0);
            $table->integer('country_id')->nullable();
            $table->integer('city_id')->nullable();
            $table->string('province_id', 2)->nullable();
            $table->string('location')->nullable();
            $table->integer('total_logins')->default(0);
            $table->date('last_login')->nullable();
            $table->text('portafolio')->nullable();
            $table->text('lookingfor')->nullable();
            $table->boolean('banned')->nullable();
            $table->boolean('unemployed')->default(1);
            $table->boolean('can_contact')->default(1);
            $table->date('date_newsletter')->nullable();
            $table->boolean('newsletter')->default(1);
            $table->boolean('alert_commercial')->default(1);
            $table->string('ip')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_email')->nullable();
            $table->string('company_cif')->nullable();
            $table->string('company_addresses')->nullable();
            $table->string('facebook_id', 30)->nullable();
            $table->string('twitter_id', 30)->nullable();
            $table->string('google_id', 30)->nullable();
            $table->string('github_id', 30)->nullable();
            $table->string('linkedin_id', 30)->nullable();
            $table->string('amazon_id', 50)->nullable();
            $table->string('url')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('forrst_url')->nullable();
            $table->string('github_url')->nullable();
            $table->string('dribbble_url')->nullable();
            $table->string('flickr_url')->nullable();
            $table->string('youtube_url')->nullable();
            $table->string('stackoverflow_url')->nullable();
            $table->string('vimeo_url')->nullable();
            $table->string('delicius_url')->nullable();
            $table->string('pinboard_url')->nullable();
            $table->string('itunes_url')->nullable();
            $table->string('android_url')->nullable();
            $table->string('chrome_url')->nullable();
            $table->string('masterbranch_url')->nullable();
            $table->string('bitbucket_url')->nullable();
            $table->integer('visits_google')->default(0);
            $table->integer('visits_finder')->default(0);
            $table->rememberToken();
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
        Schema::drop('users');
    }
}

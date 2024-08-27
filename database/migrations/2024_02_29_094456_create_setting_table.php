<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->id();
            $table->string('site_name');
            $table->string('site_email');
            $table->string('site_contact');
            $table->string('site_address');
            $table->string('site_fav_icon');
            $table->string('site_logo');
            $table->string('header_code');
            $table->string('footer_code');
            $table->string('facebook_url');
            $table->string('insta_url');
            $table->string('twitter_url');
            $table->string('youtube_url');
            $table->string('linkdin_url');
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
        Schema::dropIfExists('setting');
    }
};

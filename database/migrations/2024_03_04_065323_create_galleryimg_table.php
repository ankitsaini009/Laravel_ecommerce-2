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
        Schema::create('galleryimg', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('galleryimg');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     
     */
    public function down()
    {
        Schema::dropIfExists('galleryimg');
    }
};

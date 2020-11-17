<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavouriteContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('favourite_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('contact_id');
            $table->foreign('contact_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favourite_contacts');
    }
}

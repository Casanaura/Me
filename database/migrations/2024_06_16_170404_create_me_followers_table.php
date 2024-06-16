<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('me_followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('follower_id');
            $table->unsignedInteger('followed_id');
            $table->timestamps();

            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('followed_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        // No hacer nada en la función down para no borrar la tabla
    }
};

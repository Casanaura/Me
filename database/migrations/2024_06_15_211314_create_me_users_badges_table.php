<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('me_users_badges', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('owner');
            $table->unsignedBigInteger('badge_id');
            $table->timestamps();

            $table->foreign('owner')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('badge_id')->references('id')->on('me_badges')->onDelete('cascade');
        });
    }

    public function down()
    {
        // No hacer nada en la función down para no borrar la tabla
    }
};

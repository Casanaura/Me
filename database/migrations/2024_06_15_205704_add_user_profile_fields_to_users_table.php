<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
                $table->string('cover_photo', 64)->nullable();
                $table->string('bio', 255)->nullable();
                $table->string('country', 32)->nullable();
                $table->string('website', 32)->nullable();
                $table->bigInteger('count_followers')->default(0);
                $table->bigInteger('count_following')->default(0);
                $table->boolean('is_muted')->default(false);
        });
    }

    public function down()
    {
        // No hacer nada en la función down para no borrar la tabla
    }
};

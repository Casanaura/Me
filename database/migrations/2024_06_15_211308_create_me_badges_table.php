<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('me_badges', function (Blueprint $table) {
            $table->id();
            $table->string('badge_code', 16);
            $table->text('badge_img');
            $table->string('badge_name', 64);
            $table->string('badge_desc', 128);
            $table->enum('badge_type', ['Common', 'Uncommon', 'Rare', 'Mythic', 'Legendary', 'Limited Edition'])->default('Common');
            $table->timestamps();
        });
    }

    public function down()
    {
        // No hacer nada en la función down para no borrar la tabla
    }
};

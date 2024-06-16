<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('me_catalogue', function (Blueprint $table) {
            $table->id();
            $table->string('name', 120);
            $table->text('description');
            $table->enum('type', ['Common', 'Uncommon', 'Rare', 'Mythic', 'Legendary', 'Limited Edition'])->default('Common');
            $table->boolean('is_resellable')->default(true);
            $table->text('icon');
            $table->timestamps();
        });
    }

    public function down()
    {
        // No hacer nada en la función down para no borrar la tabla
    }
};

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
        Schema::create('logements', function (Blueprint $table) {
            $table->id();
            $table->string('lot');
            $table->string('nom_logement')->nullable();
            $table->string('image')->nullable();
            $table->double('prix')->nullable();
            $table->foreignId('cite_id')->constrained()->cascadeOnDelete();
            $table->foreignId('terrain_id')->constrained()->cascadeOnDelete();
            $table->foreignId('type_logement_id')->constrained()->cascadeOnDelete();
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
        Schema::dropIfExists('logements');
    }
};

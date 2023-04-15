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
        Schema::create('achat_type_achats', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('achat_id');
            $table->unsignedBigInteger('type_achat_id');
            $table->foreign('achat_id')->references('id')->on('achats');
            $table->foreign('type_achat_id')->references('id')->on('type_achats');
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
        Schema::dropIfExists('achat_type_achats');
    }
};

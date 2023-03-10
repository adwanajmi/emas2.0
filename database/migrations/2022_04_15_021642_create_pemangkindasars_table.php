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
        Schema::create('pemangkindasars', function (Blueprint $table) {
            $table->id();
            $table->string('namaTema');

            $table->longText('keteranganTema');
            $table->string('kategori_id')->nullable();

            $table->string('perkara_id')->nullable();
            $table->string('fokus_id')->nullable();
            $table->string('user_id')->nullable();
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
        Schema::dropIfExists('pemangkindasars');
    }
};

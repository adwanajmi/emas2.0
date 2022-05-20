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
        Schema::create('perkarautamas', function (Blueprint $table) {
            $table->id();
            $table->string('namaPerkara');
            $table->longText('keteranganPerkaraUtama');
            $table->string('kategoriUcapan')->nullable();
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
        Schema::dropIfExists('perkarautamas');
    }
};

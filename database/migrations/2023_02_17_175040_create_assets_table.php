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
        Schema::create('assets', function (Blueprint $table) {
            $table->id('id')->key();
            $table->string('stockcode');
            $table->string('code')->unique()->key();
            $table->string('nama');
            $table->string('merk');
            $table->string('model')->nullable();
            $table->string('spesifikasi');
            $table->string('deskripsi');
            $table->foreignId('id_lokasi')->default(false)->references('id')->on('locations');
            $table->string('id_kategori')->default(false)->references('id')->on('categories'); //many to many wait
            $table->string('id_status')->default(false)->references('id')->on('statuses'); //many to many wait
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
        Schema::dropIfExists('assets');
    }
};

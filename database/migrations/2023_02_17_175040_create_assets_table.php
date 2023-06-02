<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Rules\Unique;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('unit');
            $table->timestamps();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('statustype');
            $table->string('status');
            $table->timestamps();
        });
        Schema::create('assets', function (Blueprint $table) {
            $table->id()->key();
            $table->string('stockcode')->unique();
            $table->string('code_ast')->unique();
            $table->string('serialnumber');
            $table->string('name');
            $table->string('merk');
            $table->string('model')->nullable();
            $table->string('spesifikasi');
            $table->string('deskripsi');
            $table->foreignId('id_lokasi')->default(false)->references('id')->on('locations')->onDelete('cascade');
            // $table->foreignId('id_kategori')->default(false)->references('id')->on('categories'); //many to many wait
            $table->foreignId('id_status')->nullable()->unsigned()->default(false)->references('id')->on('statuses'); //many to many wait
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
        Schema::dropIfExists('locations');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('assets');
    }
};

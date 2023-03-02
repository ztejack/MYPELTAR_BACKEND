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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id('id');
            // $table->foreign('id_asset')->default(false)->references('code')->on('assets');
            $table->foreignId('id_user')->default(false)->references('id')->on('users');
            $table->string('jenis');
            $table->string('deskripsi');
            $table->string('fotobefore');
            $table->string('fotoafter');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maintenances');
    }
};

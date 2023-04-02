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
            $table->foreignId('id_asset')->default(false)->references('id')->on('assets')->onDelete('cascade');
            $table->foreignId('id_user_inspektor')->default(false)->references('id')->on('users');
            $table->foreignId('id_type')->default(false)->references('id')->on('type_maintenances');
            $table->string('deskripsi')->default(false);
            $table->string('fotobefore')->default(false);
            $table->string('fotoafter')->default(false)->nullable();
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
        Schema::dropIfExists('type_maintenances');
    }
};

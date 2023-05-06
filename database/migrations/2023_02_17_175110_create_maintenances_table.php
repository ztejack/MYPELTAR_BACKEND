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
        Schema::create('type_maintenances', function (Blueprint $table) {
            $table->id();
            $table->string('type');
        });
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id('id');
            $table->foreignId('id_asset')->default(false)->references('id')->on('assets')->onDelete('cascade');
            $table->foreignId('id_user_inspeksi')->default(false)->references('id')->on('users');
            $table->foreignId('id_type')->default(false)->references('id')->on('type_maintenances');
            $table->string('deskripsi')->default(false);
            $table->string('imagebefore')->default(false);
            $table->string('imageafter')->default(false)->nullable();
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
        Schema::dropIfExists('maintenances');
    }
};

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
            $table->foreignId('id_user')->default(false)->references('id')->on('users');
            $table->foreignId('id_type')->default(false)->references('id')->on('type_maintenances');
            $table->string('deskripsi')->default(false);
            $table->string('imagebefore')->default(false);
            $table->string('imageafter')->default(false)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
        });
        Schema::create('p_maintenance_updates', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_asset')->default(false)->references('id')->on('assets')->onDelete('cascade');
            $table->foreignId('id_user')->default(false)->references('id')->on('users');
            $table->foreignId('id_maintenance')->default(false)->references('id')->on('maintenances')->onDelete('cascade');
            $table->foreignId('id_status')->default(false)->references('id')->on('statuses')->onDelete('cascade');
            $table->string('deskripsi')->default(false)->nullable();
            $table->string('image')->default(false)->nullable();
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
        Schema::dropIfExists('type_maintenances');
        Schema::dropIfExists('maintenances');
        Schema::dropIfExists('p_updates');
    }
};

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
        Schema::create('p_updates', function (Blueprint $table) {
            $table->id();
            // $table->foreignId('id_asset')->default(false)->references('id')->on('assets')->onDelete('cascade');
            $table->foreignId('id_user')->default(false)->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('id_maintenance')->default(false)->references('id')->on('maintenances')->onDelete('cascade');
            $table->foreignId('id_status')->default(false)->references('id')->on('status_assets')->onDelete('cascade');
            $table->string('foto_after')->default(false);
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
        Schema::dropIfExists('p_updates');
    }
};

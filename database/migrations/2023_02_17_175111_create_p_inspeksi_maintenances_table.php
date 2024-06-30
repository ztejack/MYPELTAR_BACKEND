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
        Schema::create('p_inspeksi_maintenance', function (Blueprint $table) {
            // $table->id();
            $table->foreignId('maintenance_id');
            $table->foreignId('inspeksi_id');
            $table->primary(['maintenance_id', 'inspeksi_id']);
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
        Schema::dropIfExists('inspeksi_maintenance');
    }
};

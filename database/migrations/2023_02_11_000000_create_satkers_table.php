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
        Schema::create('satkers', function (Blueprint $table) {
            $table->id();
            $table->string('satker');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
        Schema::create('subsatkers', function (Blueprint $table) {
            $table->id();
            $table->string('subsatker');
            $table->foreignId('id_satker')->default(false)->references('id')->on('satkers')->onDelete('cascade');
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subsatkers');
        Schema::dropIfExists('satkers');
    }
};

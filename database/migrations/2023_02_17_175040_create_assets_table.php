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
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('statuses', function (Blueprint $table) {
            $table->id();
            $table->string('statustype');
            $table->string('status');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();
        });
        Schema::create('assets', function (Blueprint $table) {
            $table->id()->key();
            $table->string('stockcode');
            $table->string('code_ast')->unique();
            $table->string('serialnumber');
            $table->string('name');
            $table->string('brand')->nullable();
            $table->string('model')->nullable();
            $table->string('specifications')->nullable();
            $table->string('image')->nullable();
            $table->string('description')->nullable();
            $table->foreignId('id_location')->default(false)->references('id')->on('locations')->onDelete('cascade');
            // $table->foreignId('id_kategori')->default(false)->references('id')->on('categories'); //many to many wait
            $table->foreignId('id_status')->nullable()->references('id')->on('statuses')->onDelete('restrict');
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
        Schema::dropIfExists('locations');
        Schema::dropIfExists('statuses');
        Schema::dropIfExists('assets');
    }
};

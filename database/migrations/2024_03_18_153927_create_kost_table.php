<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kost', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->bigInteger('harga')->nullable();
            $table->text('alamat')->nullable();
            $table->text('description')->nullable();
            $table->string('img', 255)->nullable();
            $table->string('fasilitas', 255)->nullable();
            $table->integer('kontak')->unsigned()->nullable();
            $table->integer('star_rating')->unsigned()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kost');
    }
};

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
        Schema::create('profile_rt', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100)->nullable();
            $table->text('sambutan')->nullable();
            $table->text('deskripsi')->nullable();
            $table->text('deskripsi_kost')->nullable();
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->integer('jumlah_penduduk')->unsigned()->nullable()->default(0);
            $table->string('img', 255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_rt');
    }
};

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
        Schema::create('taggables', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('tag_id');
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('cascade');

            
               //tagable_type dan tagable_id akan digunakan untuk menghubungkan tabel tags dengan tabel lain
            //taganle_type akan berisi nama tabel yang akan dihubungkan dengan path lengkapnya
            //tagable_id akan berisi id dari tabel yang akan dihubungkan
            $table->string('taggable_type');
            $table->Integer('taggable_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taggables');
    }
};

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
        schema::create('pertanyaan', function(Blueprint $table){
            $table->id();
            $table->string('pertanyaan');
            $table->string('gambar')->nullable();
    
            $table->unsignedBigInteger('kategori_id');
            $table->foreign('kategori_id')->references('id')->on('kategori')->onDelete('cascade');
    
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
    
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
        Schema::dropIfExists('pertanyaan');
    }
};

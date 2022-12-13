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
        Schema::create('book_genre_junctions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('book_id')->constrained('books');
            $table->foreignId('genre_id')->constrained('genres');
            $table->timestamps();

            // $table->foreign('book_id')->references('id')->on('books');
            // $table->foreign('genre_id')->references('id')->on('genres');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};

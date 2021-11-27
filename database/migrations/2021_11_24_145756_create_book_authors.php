<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAuthors extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_authors', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('book_id')->unsigned()->index()->nullable();
            $table->bigInteger('author_id')->unsigned()->index()->nullable();
            $table->foreign('book_id')->references('id')->on('books')->onDelete('restrict')->onUpdate('restrict');
            $table->foreign('author_id')->references('id')->on('authors')->onDelete('restrict')->onUpdate('restrict');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('book_authors');
    }
}

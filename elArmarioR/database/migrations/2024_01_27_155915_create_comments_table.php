<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// class CreateCommentsTable extends Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Así creada por defecto con php artisan make:migration create_comments_table --create=comments
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        }); */

        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            // "comment" es el texto del comentario, el comentario en sí, para no repetir el campo con la tabla "comments"
            $table->text('comment');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
};

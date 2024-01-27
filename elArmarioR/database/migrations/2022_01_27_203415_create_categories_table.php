<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// class CreateCategoriesTable extends Migration
return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /* Así creada por defecto con php artisan make:migration create_categories_table --create=categories
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        }); */

        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('category');
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
        Schema::dropIfExists('categories');
    }
};

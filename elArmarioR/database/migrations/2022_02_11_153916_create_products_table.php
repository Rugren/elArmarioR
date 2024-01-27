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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');

            // seguir probando combinaciones de Categoría para que la guarde en la bd, hacer como comentarios, que esa sí salió bien.

            // Añadido a la tabla el campo de categoría:
            //$table->string('category'); (esto comentado solo para probar: $table->string('category')->references('id')->on('categories')->onDelete('setnull'); )
            // $table->unsignedBigInteger('id_category');
            // $table->foreign('id_category')->references('id')->on('categories');

            /* 1º manera probada. No funciona (va, pero no mete los datos en la BD)
            $table->unsignedBigInteger('id_category')->nullable();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('set null');
            */

            /* 2º manera a probar. No funciona??? 
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('set null');*/

            /* 3º manera a probar NO VA (la línea 22 y 23, las 2 comentadas // y // ) si no va la 2º. No funciona??? 
            $table->unsignedBigInteger('id_category');
            $table->foreign('id_category')->references('id')->on('categories'); */

            $table->string('category')->references('id')->on('categories')->onDelete('setnull');

            /* $table->string('category')->references('id')->on('categories')->onDelete('setnull');
            ->onDelete('setnull'): Con setnull si una fila en la tabla categories es eliminada, 
            cualquier fila en la tabla actual que haga referencia a esa fila eliminada tendrá su valor 
            en la columna category establecido en NULL. Es decir, que se queda vacío.
            Esto permite que la relación entre las tablas sea opcional y que los registros en la tabla actual 
            no se eliminen automáticamente si se elimina una fila en la tabla categories.
            */

            $table->text('description');
            /* $table->string('image'); Puesto ->nullable() que hace que pueda guardar campos de imágenes vacíos, sin imágenes. */
            $table->string('image')->nullable();
            /* cambiado el int de precio a double para que se puedan poner decimales, 
            aquí y en todos los apartados de 'price' de la web. */
            $table->double('price'); 
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
        Schema::dropIfExists('products');
    }
};

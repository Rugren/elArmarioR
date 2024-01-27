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
        Schema::table('users', function (Blueprint $table) {
            $table->string('role')->default('client');
            $table->double('balance');

            /* ESTO AQUÍ NO ES
            // Para que los usuarios puedan modificar su nombre, apellidos, dirección, teléfono, email y contraseña (esto luego implementar en la web que sea visible para ellos)
            $table->string('name');
            $table->string('surnames');
            $table->string('address');
            $table->bigInteger('phone');
            
            $table->string('email')->unique();
            $table->string('password');
            */
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['role']);
            $table->dropColumn(['balance']);
            // añadido que si está en la tabla esto, que lo borre y haga de nuevo
            /*$table->dropColumn(['name']);
            $table->dropColumn(['surnames']);
            $table->dropColumn(['address']);
            $table->dropColumn(['email']);
            $table->dropColumn(['password']);*/
        });
    }
};

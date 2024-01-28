<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    // Si el rol es admin puedo acceder al CRUD para crear, modificar y eliminar productos.

    /* En la migración: 2022_02_12_140820_alter_users_table.php
    ya va por defecto que al crear el usuario, su rol sea cliente ('client'): 
    $table->string('role')->default('client'); */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user() && Auth::user()->getRole() == 'admin') {
            return $next($request);
        } else { 
            /* Si no es admin, que por defecto es client, devolverá al inicio de la web: 'home.index', 
            pero se lo hemos cambiado para que nos lleve a la principal de productos */
            return redirect()->route('product.index');
        }
    }
}

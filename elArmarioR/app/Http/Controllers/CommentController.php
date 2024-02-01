<?php

// Este CommentController.php creado yo, no viene con el proyecto.
// Desde aquí controlamos los comentarios.

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{

    // esto crea los comentarios y los guarda en la BD.
    public function save(Request $request)
    {
        /* Si no se valida (logea), no podrá comentar
        Deja para comentar, pero no lo envía(ni muestra en la web en cada producto)
        Ni lo guarda en la bd. */
        Comment::validate($request);

        $newComment = new Comment();
        // $newComment->setComment($request->input('comment')); // así comentarios normales
        // $newComment->setComment(strip_tags($request->input('comment'))); // así con comentarios de texto enriquecido
         $newComment->setComment(htmlspecialchars_decode(strip_tags($request->input('comment')))); // así con comentarios de texto enriquecido
        $newComment->setUserId($request->input('user_id'));
        $newComment->setProductId($request->input('product_id'));
        $newComment->save();

        return back();
    }
}
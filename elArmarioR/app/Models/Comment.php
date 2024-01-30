<?php

// Este Comment.php creado yo, no viene con el proyecto.
// Desde aquí crearemos los comentarios.

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public static function validate($request)
    {
        $request->validate([
            "comments" => "",
            'user_id' => "gt:0",
            'product_id' => "gt:0",
        ]);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getComment()
    {
        return $this->attributes['comment'];
    }

    public function setComment($comment)
    {
        $this->attributes['comment'] = $comment;
    }

    /* Corregido arriba, porque tenía un fallo que es 'comments' y corregido con 'comment'
    public function getComment()
    {
        return $this->attributes['comments'];
    }

    public function setComment($comment)
    {
        $this->attributes['comments'] = $comment;
    }
    */

    public function getUserId()
    {
        return $this->attributes['user_id'];
    }

    public function setUserId($user_id)
    {
        $this->attributes['user_id'] = $user_id;
    }

    public function getProductId()
    {
        return $this->attributes['product_id'];
    }

    public function setProductId($product_id)
    {
        $this->attributes['product_id'] = $product_id;
    }


    public function getCreatedAt() {
        return $this->createdAt;
    }

    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }



}

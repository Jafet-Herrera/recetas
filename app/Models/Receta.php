<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receta extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'titulo','ingredientes','preparacion','user_id','imagen','categoria_id'
    ];

    //declaración de cardanildad 1:1 de catgoria_id pertenece a la tabla categorias
    public function categoria()
    {
        return $this->belongsTo(CategoriaReceta::class);
    }

    public function autor(){
        return $this->belongsTo(User::class, 'user_id');
    }
}

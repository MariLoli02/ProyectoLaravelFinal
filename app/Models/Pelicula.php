<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelicula extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'sinopsis', 'image', 'estreno', 'duracion', 'genero_id', 'user_id'];

    public function genero(){
        return $this->belongsTo(Genero::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}

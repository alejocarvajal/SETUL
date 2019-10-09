<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class RegistroJuego extends Model
{
    use SoftDeletes;
    protected $table = 'registro_juego';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'participante_id', 'pregunta_id', 'orden'
    ];
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Respuesta extends Model
{
    use SoftDeletes;
    protected $table = 'respuestas';
    protected $dates = ['delete_at'];
    protected $fillable = ['respuesta', 'correcta'];

    public function pregunta()
    {
        return $this->BelongsTo(Pregunta::class);
    }
}

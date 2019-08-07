<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Test extends Model
{
    use SoftDeletes;
    protected $table = 'tests';
    protected $dates = ['delete_at'];
    protected $fillable = [
        'nombre', 'descripcion','fecha','preguntas_total','preguntas_baja','preguntas_media','preguntas_alta'
    ];

    public function asignaturas()
    {
        return $this->belongsToMany(Asignatura::class);

    }
    public function participantes()
    {
        return $this->hasMany(Participante::class);

    }
}

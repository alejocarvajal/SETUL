<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asignatura extends Model
{
    use SoftDeletes;
    protected $table ='asignaturas';
    protected  $dates = ['delete_at'];
    protected $fillable = [
        'nombre', 'descripcion'
    ];

    public function tests(){
        return $this->BelongsToMany(Test::class);
    }
    public function preguntas(){
        return $this->hasMany(Pregunta::class);
    }
}

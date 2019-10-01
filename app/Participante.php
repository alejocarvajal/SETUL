<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Participante extends Model
{
    use SoftDeletes;
    protected $table ='participantes';
    protected  $dates = ['delete_at'];
    protected $fillable = [
        'nombres', 'identificacion', 'universidad', 'opc1', 'opc2', 'estado', 'test_id'
    ];

    public function test(){
        return $this->BelongsTo(Test::class);
    }
}

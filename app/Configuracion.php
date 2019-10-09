<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Configuracion extends Model
{
    use SoftDeletes;
    protected $table ='table_configuracion';
    protected  $dates = ['delete_at'];
    protected $fillable = [
        'nombre', 'valor'
    ];
}
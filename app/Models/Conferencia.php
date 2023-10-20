<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conferencia extends Model
{
    use HasFactory;

    //fillables
    protected $fillable = [
        "titulo",
        "ponente",
        "descripcion",
        "fecha",
        "hora",
        "lugar",
        'capacidad_asistentes'



    ];
}

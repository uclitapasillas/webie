<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands'; // Nombre de la tabla asociada
    protected $fillable = ['name', 'description']; // Campos que se pueden llenar masivamente

}

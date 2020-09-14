<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * Lo siguiente es para saltar la conveccion de laravel
     * en la cual los nombres de las tablas deben ser }
     * en plural ya que yo utilizo nombres en singular
     */
    protected $table = "permission";
}

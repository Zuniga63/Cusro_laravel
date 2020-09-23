<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class RolHasMenu extends Model
{
    protected $table = "menu";
    /**
     * Esto contiene los campos o atributos pertenecientes a este modelo
     * que se pueden crear de forma masiva. Es decir que no van a requerir invocar
     * al modelo para especificar los nombres dee estos campos. Esto permite mejorar la
     * seguridad del proyecto al no permitir que campos que no sean los siguiente puedan ser ingresados 
     * masivamente.
     */
    protected $fillable = ['name', 'url', 'icon'];

    /**
     * Permite definir los campos que laravel no va apermitir modificar
     * de ninguna manera
     */
    protected $guarded = ['id'];
    /**
     * Si este modelo no usa campos timestamp se debe indicar con false que este modelo
     * no los usa para evitar errores al nivel de la base de datos.
     */
    protected $timestamps = false;
}

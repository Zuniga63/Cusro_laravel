<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PermissionTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //Se crean los roles de la table rol
    $rols = [
      'Crear permisos',
      'Eliminar permisos',
      'Crear roles'
    ];
    //Ahora se crean los datos usando DB
    foreach ($rols as $key => $value) {
      DB::table('permission')->insert([
        'name' => $value,
        'slug' => str_replace(' ', "_", mb_strtolower($value)),
        'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
      ]);
    } //end of foreach()
  }
}

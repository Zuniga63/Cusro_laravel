<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolTableSeeder extends Seeder
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
            'administrador',
            'editor',
            'supervisor'
        ];
        //Ahora se crean los datos usando DB
        foreach($rols as $key => $value){
            DB::table('rol')->insert([
                'name' => $value,
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }//end of foreach()
    }//end of run()
}

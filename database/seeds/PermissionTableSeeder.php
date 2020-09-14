<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Despues de crear el modelo y el factory
        //Lo que se hace es invocar el modelo
        factory(Permission::class, 100)->create();
    }
}

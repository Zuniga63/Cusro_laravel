<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->truncate_tables([
            'rol',
            'permission',
            'user',
        ]);
        $this->call(RolTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }

    /**
     * Este metodo se encarga de eliminar los datos contenidos 
     * en el listado para que al volver  sembrar los datos
     * del seeder estos se dupliquen
     */
    protected function truncate_tables($tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;');
        foreach ($tables as $table) {
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS = 1;');
    }
}

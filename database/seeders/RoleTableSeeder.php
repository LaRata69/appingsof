<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'administrador';
        $role->description = 'Administrador';
        $role->save();

        $role = new Role();
        $role->name = 'docente';
        $role->description = 'Docente';
        $role->save();

        $role = new Role();
        $role->name = 'alumno';
        $role->description = 'Alumno';
        $role->save();

        $role = new Role();
        $role->name = 'ayudante';
        $role->description = 'Ayudante';
        $role->save();
    }
}

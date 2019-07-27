<?php

use Illuminate\Database\Seeder;
use App\Rol;
class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = new Rol();
        $admin_role->rol = 'admin';
        $admin_role->save();

        $user_role = new Rol();
        $user_role->rol = 'user';
        $user_role->save();
    }
}

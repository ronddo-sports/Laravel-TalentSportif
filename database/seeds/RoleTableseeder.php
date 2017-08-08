<?php

use App\Model\Role;
use Illuminate\Database\Seeder;

class RoleTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     * $table->string('name')->unique();
    $table->string('description');
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Le big Boss';
        $role->save();

        $role0 = new Role();
        $role0->name = 'client';
        $role0->description = 'Un utilisateur simple du systeme';
        $role0->save();

    }
}

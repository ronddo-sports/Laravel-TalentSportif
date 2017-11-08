<?php

use App\Model\Album;
use App\Model\Role;
use App\Model\User;
use Illuminate\Database\Seeder;

class UserTableseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name','admin')->first();
        $role_visit = Role::where('name','client')->first();

        $user = new User();
        $user->username = 'Momo Tidjani';
        $user->username_canonical = 'momo_tidjani';
        $user->email = 'admin@g.com';
        $user->discr = 'admin';
        $user->discipline = 'administration';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_admin);

        $user0 = new User();
        $user0->username = 'Jean Louis';
        $user0->username_canonical = 'jean_louis';
        $user0->discr = 'admin';
        $user0->discipline = 'administration';
        $user0->date_naiss = new DateTime();
        $user0->email = 'talentsportif@gmail.com';
        $user0->password = bcrypt('passe');
        $user0->save();
        $user0->roles()->attach($role_admin);


        Album::create(['owner_id'=>$user0->id,'owner_table'=>'users',
            'name'=>'uploads','name_canonical'=>'uploads']);
  // soft delete: Toujours present mais inaccessible a la rechere

        Album::create(['owner_id'=>$user->id,'owner_table'=>'users',
            'name'=>'uploads','name_canonical'=>'uploads']);
        /*$user1 = new User();
        $user1->name = 'Gangster';
        $user1->email = 'visiteur@gmail.com';
        $user1->password = bcrypt('visiteur');
        $user1->save();
        $user1->roles()->attach($role_visit);*/
    }
}

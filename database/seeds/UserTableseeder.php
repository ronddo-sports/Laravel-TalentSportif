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
        $user->pseudo = 'tidjani237';
        $user->username_canonical = 'momo_tidjani';
        $user->api_token = 'momo_tidjani_'.str_random(10);
        $user->email = 'admin@g.com';
        $user->discr = 'admin';
        $user->discipline = 'administration';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_admin);


        Album::create(['user_id'=>$user->id,'post_id'=> 0,
            'name'=>'uploads','name_canonical'=>'uploads']);
        $user0 = new User();
        $user0->username = 'Jean Louis';
        $user0->username_canonical = 'jean_louis';
        $user0->pseudo = 'jey_lou';
        $user0->api_token = 'jean_louis_'.str_random(10);
        $user0->discr = 'admin';
        $user0->discipline = 'administration';
        $user0->date_naiss = new DateTime("2012-03-10");
        $user0->email = 'talentsportif@gmail.com';
        $user0->password = bcrypt('passe');
        $user0->save();
        $user0->roles()->attach($role_admin);
        Album::create(['user_id'=>$user0->id,'post_id'=>0,
            'name'=>'uploads','name_canonical'=>'uploads']);

        $user = new User();
        $user->username = 'Etouka Ebong';
        $user->pseudo = 'etouka_237';
        $user->username_canonical = 'etouka_ebong';
        $user->api_token = 'etouka_ebong_'.str_random(10);
        $user->email = 'etouka@g.com';
        $user->discr = 'client';
        $user->discipline = 'Football';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_visit);
        Album::create(['user_id'=>$user->id,'post_id'=>0,
            'name'=>'uploads','name_canonical'=>'uploads']);

        $user = new User();
        $user->username = 'Geukeng Frank';
        $user->pseudo = 'frank724';
        $user->username_canonical = 'geukeng_frank';
        $user->api_token = 'geukeng_frank_'.str_random(10);
        $user->email = 'franky@g.com';
        $user->discr = 'client';
        $user->discipline = 'BasketBall';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_visit);
        Album::create(['user_id'=>$user->id,'post_id'=>0,
            'name'=>'uploads','name_canonical'=>'uploads']);

        $user = new User();
        $user->username = 'Adrien nickson';
        $user->pseudo = 'mani237';
        $user->username_canonical = 'adrien_nickson';
        $user->api_token = 'adrien_nickson_'.str_random(10);
        $user->email = 'nickson@g.com';
        $user->discr = 'client';
        $user->discipline = 'BasketBall';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_visit);
        Album::create(['user_id'=>$user->id,'post_id'=>0,
            'name'=>'uploads','name_canonical'=>'uploads']);

        $user = new User();
        $user->username = 'Joseph Pascal';
        $user->pseudo = 'warman237';
        $user->username_canonical = 'joseph_pascal';
        $user->api_token = 'joseph_pascal_'.str_random(10);
        $user->email = 'jp@g.com';
        $user->discr = 'client';
        $user->discipline = 'Billes';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_visit);
        Album::create(['user_id'=>$user->id,'post_id'=>0,
            'name'=>'uploads','name_canonical'=>'uploads']);

        $user = new User();
        $user->username = 'Fire man';
        $user->pseudo = 'fire237';
        $user->username_canonical = 'fire_man';
        $user->api_token = 'fire_man_'.str_random(10);
        $user->email = 'fire@g.com';
        $user->discr = 'client';
        $user->discipline = 'Volley';
        $user->date_naiss = new DateTime();
        $user->password = bcrypt('passe');
        $user->save();
        $user->roles()->attach($role_visit);
        Album::create(['user_id'=>$user->id,'post_id'=>0,
            'name'=>'uploads','name_canonical'=>'uploads']);

    }
}

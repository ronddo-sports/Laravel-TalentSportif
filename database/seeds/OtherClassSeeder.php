<?php

use Illuminate\Database\Seeder;

class OtherClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $val = ['discr'=>'djndskj','type'=>'video',
            'source'=>'youtube',
            'url'=>"https://www.youtube.com/embed/SSIJELH8Khk",'user_id'=>2];

        \App\Model\Medium::create($val);
        $post = ['titre'=> "Premiere video Ts",
            'titre_canonical'=>"Premiere_video_Ts",
            'lieu'=>"Essos",
            'tags'=>"foot,bascket,sport",
            'privacy'=>"public",
            'text'=>"Loreme ipsum sit admet Loreme ipsum sit admet Loreme ipsum sit admet from server",
            'type'=>'post',
            'parent_id'=>0,
            'user_id'=>2];
        \App\Model\Post::create($post);

    }
}

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







        $pos = ['titre'=> "Premiere video Ts",
            'titre_canonical'=>"Premiere_video_Ts",
            'lieu'=>"Essos",
            'token'=> str_random(10),
            'tags'=>"foot,basket,sport",
            'privacy'=>"public",
            'text'=>"Mon Loreme ipsum sit non generé admet Loreme ipsum sit admet Loreme ipsum sit admet from server",
            'type'=>'post',
            'parent_id'=>0,
            'user_id'=>2];
        $post = \App\Model\Post::create($pos);
        $val = ['discr'=>'downloads',
            'type'=>'video',
            'source'=>'youtube',
            'url'=>"https://www.youtube.com/embed/SSIJELH8Khk",
            'post_id'=>$post->id,
            'user_id'=>2];

        \App\Model\Medium::create($val);



        $pos = ['titre'=> "Miley cyrus wreking ball version courte",
            'titre_canonical'=>"Miley_cyrus_wreking_ball_version_courte",
            'lieu'=>"Essos",
            'tags'=>"musique,brick,video",
            'token'=> str_random(10),
            'privacy'=>"public",
            'text'=>"Deuxieme Loreme ipsum sit non generé admet Loreme ipsum sit admet Loreme ipsum sit admet from server",
            'type'=>'post',
            'parent_id'=>0,
            'user_id'=>3];
        $posta = \App\Model\Post::create($pos);
        $val = ['discr'=>'downloads',
            'type'=>'video',
            'source'=>'youtube',
            'url'=>"https://youtube.googleapis.com/v/My2FRPA3Gf8",
            'post_id'=>$posta->id,
            'user_id'=>2];

        \App\Model\Medium::create($val);
    }
}

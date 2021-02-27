<?php

use Illuminate\Database\Seeder;

class VideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = ['1980', 'Boop Bitty', 'Burning', 'Champions', 'Dino Land', 'Last Night', 'Last Race', 'Looters', 'The Illusion', 'The Last Breath'];
        $quality = ['HD', 'Full HD', 'HD', 'Full HD', 'HD', 'Full HD', 'HD', 'Full HD', 'HD', 'Full HD'];

        for ($i=0; $i < count($name); $i++){
            $video = \App\Models\Video::create([
                'title'         => $name[$i],
                'image'         => '1.jpg',
                'category_id'   => mt_rand(1,10),
                'quality'       => $quality[$i],
                'description'   => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet',
                'language'      => 'English',
                'release'       => mt_rand(2010,2020),
                'duration'      => '2h 32m',
                'video'         => 'sample-video.mp4',
                'slug'          => strtolower(str_replace(' ', '-', $name[$i])),
                'inHome'        => mt_rand(0,1),
                'content'       => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed rhoncus non elit a scelerisque. Etiam feugiat luctus est, vel commodo odio rhoncus sit amet'
            ]);
        }
    }
}

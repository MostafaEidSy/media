<?php

use Illuminate\Database\Seeder;

class VideoSeasonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 1,
            'video_id'          => 1
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 1,
            'video_id'          => 2
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 1,
            'video_id'          => 3
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 1,
            'video_id'          => 4
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 2,
            'video_id'          => 1
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 2,
            'video_id'          => 2
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 3,
            'video_id'          => 2
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 4,
            'video_id'          => 2
        ]);
        $video = \App\Models\VideoSeason::create([
            'season_id'         => 4,
            'video_id'          => 2
        ]);
    }
}

<?php

namespace Database\Seeders;

use App\Services\TranslitService;
use Illuminate\Database\Seeder;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $news_title = 'Новость';

        for($index=1; $index < 7; $index++) {
            $item = $news_title.' '.$index;
            DB::table('news')->insert([
                [
                    'id' => $index,
                    'type' => 'news',
                    'slug' => strtolower(TranslitService::makeLatin($item)),
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
            DB::table('news_translations')->insert([
                [
                    'news_id' => $index,
                    'title' => $item,
                    'short' => $item.' short',
                    'full' => $item.' full',

                    'meta_title' => $item.' title',
                    'meta_keywords' => $item.' keywords',
                    'meta_description' => $item.' description',

                    'locale' => 'ru',

                ]
            ]);
        }

    }
}

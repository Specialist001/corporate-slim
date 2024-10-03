<?php

namespace Database\Seeders;

use App\Services\TranslitService;

class ServiceCategoriesTableSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category_title = 'Категория';

        for($index=1; $index < 5; $index++) {
            $item = $category_title.' '.$index;
            DB::table('service_categories')->insert([
                [
                    'id' => $index,
                    'parent_id' => 0,
                    'type' => null,
                    'slug' => strtolower(TranslitService::makeLatin($item)),
                    'active' => 1,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s'),
                ]
            ]);
            DB::table('service_category_translations')->insert([
                [
                    'service_category_id' => $index,
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

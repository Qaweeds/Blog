<?php

namespace Database\Seeders;

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class BlogCaregoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = array();
        $c_name = 'Без категории';
        $categories[] = array('title' => $c_name, 'slug' => Str::slug($c_name), 'parent_id' => 0);

        for ($i = 2; $i <= 11; $i++) {
            $c_name = 'Категория ' . $i;
            $parent_id = ($i > 4) ? rand(1, 4) : 1;

            $categories[] = array('title' => $c_name, 'slug' => Str::slug($c_name), 'parent_id' => $parent_id);
        }
        BlogCategory::insert($categories);
    }
}

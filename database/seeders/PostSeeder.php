<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'title_posts' => 'Mỗi ngày 1 câu chuyện cười',
            'content_posts' => 'Chân trời nào mà chả có giông bão, chỉ là kẻ có chỗ trú, người thì ướt mưa :))',
            'created_at_time_posts' => date('Y-m-d'),
            'id_users' => '1',
        ]);
    }
}
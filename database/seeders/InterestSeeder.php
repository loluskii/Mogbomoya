<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InterestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('interests')->insert([
            'name' => 'Gambling',
            'icon' => 'gambling.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Outdoor Sports',
            'icon' => 'cycling.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Child Care',
            'icon' => 'childcare.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Travel',
            'icon' => 'travel.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Cyber Security',
            'icon' => 'security.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Politics',
            'icon' => 'politics.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Lifestyle',
            'icon' => 'lifestyle.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Weddings',
            'icon' => 'wedding.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Comedy',
            'icon' => 'comedy.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Fashion',
            'icon' => 'fashion.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Education',
            'icon' => 'education.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Art',
            'icon' => 'art.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Music',
            'icon' => 'music.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Media & Entertainment',
            'icon' => 'media.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Design',
            'icon' => 'design.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Food',
            'icon' => 'food.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Business',
            'icon' => 'business.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'eSports & Gaming',
            'icon' => 'gaming.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Religion',
            'icon' => 'religion.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Science',
            'icon' => 'science.svg',
        ]);

        DB::table('interests')->insert([
            'name' => 'Sustainability',
            'icon' => 'sus.svg',
        ]);
    }
}

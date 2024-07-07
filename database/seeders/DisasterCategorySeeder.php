<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DisasterCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['name' => 'Earthquake', 'description' => 'A sudden and violent shaking of the ground, sometimes causing great destruction.'],
            ['name' => 'Flood', 'description' => 'An overflow of water that submerges land which is usually dry.'],
            ['name' => 'Wildfire', 'description' => 'A large, destructive fire that spreads quickly over woodland or brush.'],
            ['name' => 'Tornado', 'description' => 'A mobile, destructive vortex of violently rotating winds.'],
            ['name' => 'Hurricane', 'description' => 'A storm with a violent wind, typically a tropical cyclone.'],
            ['name' => 'Drought', 'description' => 'A prolonged period of abnormally low rainfall, leading to a shortage of water.'],
            ['name' => 'Landslide', 'description' => 'The sliding down of a mass of earth or rock from a mountain or cliff.'],
            ['name' => 'Volcanic Eruption', 'description' => 'The sudden occurrence of a violent discharge of steam and volcanic material.'],
            ['name' => 'Tsunami', 'description' => 'A long high sea wave caused by an earthquake or other disturbance.'],
            ['name' => 'Pandemic', 'description' => 'A disease prevalent over a whole country or the world.']
        ];

        foreach ($categories as $category) {
            DB::table('disaster_categories')->insert([
                'name' => $category['name'],
                'description' => $category['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

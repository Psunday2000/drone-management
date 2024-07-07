<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use GuzzleHttp\Client as GuzzleClient;
use Faker\Factory as Faker;

class DroneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $client = new GuzzleClient([
            'base_uri' => 'https://api.unsplash.com/',
            'timeout'  => 2.0,
        ]);

        $accessKey = 'xxxxxxxxxxxxxxxxxxxxxxxxxxx'; // Replace with your Unsplash Access Key
        $perPage = 50; // Number of images to fetch per page

        $controllerIds = range(2, 6);
        $vehicleTechNames = [
            'TechJet', 'AeroCruiser', 'SkyRanger', 'FlyTech', 'DroneX',
            'HoverMaster', 'AirScout', 'RoboFly', 'Nimbus', 'SkyTech',
            'FlyerBot', 'TechFlyer', 'AeroBot', 'HoverDrone', 'SkyHawk',
            'TechEagle', 'AeroMaster', 'SkyBot', 'FlyMaster', 'DroneMaster'
        ];

        for ($page = 1; $page <= 5; $page++) { // Fetch 5 pages of images (total 250 images)
            $response = $client->request('GET', 'search/photos', [
                'query' => [
                    'query' => 'drone',
                    'per_page' => $perPage,
                    'page' => $page,
                    'client_id' => $accessKey,
                ],
            ]);

            $images = json_decode($response->getBody()->getContents(), true)['results'];

            foreach ($images as $image) {
                $tries = 0;
                $maxTries = 10000;

                $name = $faker->randomElement($vehicleTechNames);

                do {
                    $tries++;
                    $name = $name . '-' . $faker->randomNumber(3);
                } while (DB::table('drones')->where('name', $name)->exists() && $tries < $maxTries);

                // Generate random drone data
                $droneData = [
                    'name' => $name,
                    'controller_id' => $faker->randomElement($controllerIds),
                    'fleet_no' => 'CSDD-' . $faker->unique()->numerify('#####'),
                    'battery_level' => $faker->numberBetween(0, 100),
                    'is_active' => 0,
                    'image' => $image['urls']['raw'], // Store image URL
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

                DB::table('drones')->insert($droneData);
            }
        }
    }
}

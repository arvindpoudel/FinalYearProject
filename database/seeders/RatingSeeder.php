<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\Rating;
class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csvData = fopen(base_path('database/csv/rating.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Rating::create([                   
                    'user_id' => $data['0'],
                    'movie_id' => $data['1'],
                    'rating' => $data['2'],
                    
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
}

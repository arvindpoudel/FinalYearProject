<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Movie::truncate();
        $csvData = fopen(base_path('database/csv/movies.csv'), 'r');
        $transRow = true;
        while (($data = fgetcsv($csvData, 555, ',')) !== false) {
            if (!$transRow) {
                Movie::create([
                    'id' => $data['0'],
                    'title' => $data['1'],
                    'genre' => $data['2'],
                    
                ]);
            }
            $transRow = false;
        }
        fclose($csvData);
    }
} 


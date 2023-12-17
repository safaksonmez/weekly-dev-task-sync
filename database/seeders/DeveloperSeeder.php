<?php

namespace Database\Seeders;

use App\Models\Developer;
use Illuminate\Database\Seeder;

class DeveloperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Developer::create([
            'name' => 'Developer 1',
            'efficiency' => 1,
        ]
        );
        Developer::create([
            'name' => 'Developer 2',
            'efficiency' => 2,
        ]);
        Developer::create([
            'name' => 'Developer 3',
            'efficiency' => 3,
        ]);
        Developer::create([
            'name' => 'Developer 4',
            'efficiency' => 4,
        ]);
        Developer::create([
            'name' => 'Developer 5',
            'efficiency' => 5,
        ]);
    }
}

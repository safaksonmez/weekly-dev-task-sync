<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Provider; 

class ProviderSeeder extends Seeder
{
    public function run()
    {
        // First provider
        Provider::create([
            'name' => 'Provider 1', 
            'task_value_key' => 'zorluk', 
            'task_estimated_duration_key' => 'sure', 
            'task_name_key' => 'id', 
            'url' => 'https://run.mocky.io/v3/27b47d79-f382-4dee-b4fe-a0976ceda9cd', 
        ]);

        // Second provider
        Provider::create([
            'name' => 'Provider 2', 
            'task_value_key' => 'value', 
            'task_estimated_duration_key' => 'estimated_duration', 
            'task_name_key' => 'id', 
            'url' => 'https://run.mocky.io/v3/7b0ff222-7a9c-4c54-9396-0df58e289143', 
        ]);
    }
}


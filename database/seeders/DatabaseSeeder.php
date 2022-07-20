<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\Topic::create([
            'topic' => 'Transformers',
            'description' => 'In this unit, you will be introduced to the definition, purpose, types, and characteristics of the transformer. You will also be exposed to the principle of mutual induction.',
            'length' => '45Mins',
            'difficulty' => 'Easy'
        ]);

        \App\Models\Topic::create([
            'topic' => 'Series and Parallel Connections',
            'description' => 'Some Basic Descriptions',
            'length' => '45Mins',
            'difficulty' => 'Easy'
        ]);

    }
}

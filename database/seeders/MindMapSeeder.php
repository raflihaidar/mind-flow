<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \App\Models\MindMap;
use Illuminate\Support\Str;

class MindMapSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MindMap::create([
            'title' => 'Belajar Laravel',
            'creator' => [
                'user_id' => '38f280fd-22c2-4c91-81b9-1e86e58f9485',
                'name' => 'Admin Mind Flow',
                'username' => 'admin',
                'email' => 'admin@mindflow.com'
            ],
            'nodes' => [
                [
                    'id' => 1,
                    'type' => 'default',
                    'position' => [
                        'x' => 50,
                        'y' => 50
                    ],
                    'data' => [
                        'label' => 'Laravel',
                    ]
                ],
                [
                    'id' => 2,
                    'type' => 'input',
                    'position' => [
                        'x' => 100,
                        'y' => 100
                    ],
                    'data' => [
                        'label' => 'Routing',
                    ]
                ]
            ],
            'edges' => [
                [
                    'id' => 'e1->2',
                    'source' => '1',
                    'target' => '2'
                ]
            ],
        ]);
    }
}

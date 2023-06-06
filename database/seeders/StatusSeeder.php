<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'status' => 'To Do',
                'slug' => 'to-do',
            ],
            [
                'status' => 'Doing',
                'slug' => 'doing',
            ],
            [
                'status' => 'Done',
                'slug' => 'done',
            ],
        ];

        foreach ($statuses as $stat) {
            $status = new Status();

            $status->status = $stat['status'];
            $status->slug = $stat['slug'];

            $status->save();
        }
    }
}

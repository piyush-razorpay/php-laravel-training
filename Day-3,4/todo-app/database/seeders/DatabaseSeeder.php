<?php

namespace Database\Seeders;

use App\Http\Controllers\API\TasksController;
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
        $this->call(TasksSeeder::class);
    }
}

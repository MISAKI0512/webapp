<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\support\Facades\DB;
use App\Models\Todo;

class TodosTableSeeder extends Seeder
{
    public function run()
    {
        Todo::factory()->count(3)->create();
    }
}

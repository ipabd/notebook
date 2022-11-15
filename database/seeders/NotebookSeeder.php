<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NotebookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Notebook::factory(100)->create();
    }
}

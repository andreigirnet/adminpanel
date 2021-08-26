<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create(['title'=>'Entertainment']);
        Category::create(['title'=>'Programming']);
        Category::create(['title'=>'Design']);
        Category::create(['title'=>'Laravel']);
        Category::create(['title'=>'React']);
    }
}

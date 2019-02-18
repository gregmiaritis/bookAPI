<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategoriesTableSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'PHP'
        ]);

        Category::create([
            'id' => 2,
            'name' => 'JavaScript'
        ]);

        Category::create([
            'id' => 3,
            'name' => 'Linux'
        ]);
    }
}

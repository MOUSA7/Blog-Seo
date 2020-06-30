<?php

use App\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $html = new Category();
        $html->name = 'HTML';
        $html->slug = 'html';
        $html->save();


        $laravel = new Category();
        $laravel->name = 'Laravel';
        $laravel->slug = 'laravel';
        $laravel->save();

        $php = new Category();
        $php->name = 'PHP';
        $php->slug = 'php';
        $php->save();
        //
    }
}

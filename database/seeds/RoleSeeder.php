<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Admin = new Role();
        $Admin->name = 'Admin';
        $Admin->save();

        $author = new Role();
        $author->name = 'Author';
        $author->save();

        $mentor = new Role();
        $mentor->name = 'Mentor';
        $mentor->save();

        //
    }
}

<?php

use Illuminate\Database\Seeder;

/**
 * Class AdminsTableSeeder
 */
class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admins')->insert([
            'name' => 'Andrey',
            'email' => 'andrey@admin.loc',
            'password' => bcrypt('251861962'),
            'remember_token' => Str::random(10),
            'created_at' => date('Y-m-d H:i:s'),
        ]);
    }
}

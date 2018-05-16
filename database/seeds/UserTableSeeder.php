<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        $user = new \App\User;

        $user::create(array(
            'name'     => 'test test',
            'username' => 'admin',
            'level' => '0',
            'email'    => 'admin@admin.io',
            'password' => Hash::make('tarakonas16'),
        ));
    }
}

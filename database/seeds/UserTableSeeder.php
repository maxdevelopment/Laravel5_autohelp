<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $users = array(
            array(
                'name' => 'admin',
                'email' => 'admin@admin.local',
                'login' => 'admin',
                'password' => Hash::make('a111111'),
                'isAdmin' => 1,
                'isActive' => 1
            ));
        foreach ($users as $user):
            User::create($user);
        endforeach;
    }
}

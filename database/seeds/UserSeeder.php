<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user1 = new User();
        $user1->name = 'Tien Nguyen';
        $user1->email = 'tien@cg.com';
        $user1->password = Hash::make('tien1234');
        $user1->save();
    }
}

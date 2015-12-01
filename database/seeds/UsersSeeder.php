<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $users = array(
                ['fname' => 'Devroy', 'lname' => 'Blake', 'email' => 'necrodevz@gmail.com', 'password' => Hash::make('necromancer'), 'tel' => 8763262701, 'admin' => true],
        );
            
        // Loop through each user above and create the record for them in the database
        DB::table('users')->insert($users);
    }
}

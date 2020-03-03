<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = 1;
        DB::table('users')->insert([
            [
                'id' => $index,
                'role' => 'admin',
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('admin1234'),
                'active' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
            [
                'id' => $index+1,
                'role' => 'user',
                'name' => 'Agent',
                'username' => 'user2',
                'password' => Hash::make('user1234'),
                'active' => '1',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}

<?php

use App\User;
use Carbon\Carbon;
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
        $users = [
            [
                'name' => 'test',
                'email' => 'test@test.com',
                'password' => 'test123',
            ]
        ];

        $now = Carbon::now();
        $data = [];
        foreach ($users as $user) {
            $data[] = array_merge($user, [
                'password' => bcrypt($user['password']),
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }

        User::insert($data);

        $count = count($users);

        echo "-------------------\n";
        echo "增加 $count 个用户\n";
        foreach ($users as $user) {
            echo "-------------------\n";
            echo "用户名: " . $user['email'] . "\n";
            echo "密码: " . $user['password'] . "\n";
        }
        echo "-------------------\n";
    }
}

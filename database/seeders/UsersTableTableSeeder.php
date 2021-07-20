<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'name' => 'Автор не известен',
                'email'=> 'author_unknown@com.com',
                'password' => bcrypt('qqqqqqqq'),
            ],
            [
                'name' => 'Автор',
                'email'=> 'author@com.com',
                'password' => bcrypt('qqqqqqqq'),
            ]
        ];
        User::insert($data);
    }
}

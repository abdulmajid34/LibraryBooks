<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserAdmin;

class useradminseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserAdmin::create([
            'name'     => 'admin',
            'email'    => 'admin@localhost.com',
            'role'    => 'admin',
            'password' => bcrypt('qweqwe'),
        ]);
    
        UserAdmin::create([
            'name'     => 'developer',
            'email'    => 'developer@localhost.com',
            'role'    => 'user',
            'password' => bcrypt('qweqwe'),
        ]);
    }
}

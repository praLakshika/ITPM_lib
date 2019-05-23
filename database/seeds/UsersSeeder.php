<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersSeeder extends Seeder
{
    use DisableForeignKeys, TruncateTable;

    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        $this->disableForeignKeys();
        $this->truncate('users');

        $users = [
            [
                'name' => 'Admin',
                'email' => 'admin.laravel@labs64.com',
                'password' => bcrypt('894564124'),
                'active' => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'usertype' => 'administrator'
             ]
            ,
             [
                'name' => 'Admin2',
                'email' => 'sdd@labs64.com',
                'password' => bcrypt('894564123'),
                'active' => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'usertype' => 'administrator'
             ]
            ,
            
            [
                'name' => 'Demo',
                'email' => 'demo.laravel@labs64.com',
                'password' => bcrypt('demo'),
                'active' => true,
                'confirmation_code' => \Ramsey\Uuid\Uuid::uuid4(),
                'confirmed' => true,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'usertype' => 'receptionist'
            ]
        ];

        DB::table('users')->insert($users);

       
    }
}

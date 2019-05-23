<?php

use Database\traits\TruncateTable;
use Database\traits\DisableForeignKeys;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
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
        $this->truncate('roles');

        $roles = [['name' => 'administrator'], ['name' => 'Patient']
        ];

        DB::table('roles')->insert($roles);

        $this->enableForeignKeys();
        DB::table('resetquestion')->insert([
            'Question' => 'What is the first and last name of your first boyfriend or girlfriend?',
                'type' => '1'
        ]);
        DB::table('resetquestion')->insert([
            'Question' => 'Which phone number do you remember most from your childhood?',
                'type' => '1'
        ]);
        DB::table('resetquestion')->insert([
            'Question' => 'What was your favorite place to visit as a child?',
            'type' => '1'
        ]);

        DB::table('resetquestion')->insert([
            'Question' => 'What is the name of your favorite pet?',
            'type' => '2'
        ]);

        DB::table('resetquestion')->insert([
            'Question' => 'In what city were you born?',
                'type' => '2'
        ]);

        DB::table('resetquestion')->insert([
            'Question' => 'What high school did you attend?',
                'type' => '2'
        ]);

        DB::table('resetquestion')->insert([
            'Question' => 'What is your mother maiden name?',
                'type' => '3'
        ]);

        DB::table('resetquestion')->insert([
            'Question' => 'What is your father middle name?',
                'type' => '3'
        ]);
        DB::table('resetquestion')->insert([
            'Question' => 'What is the name of your first grade teacher?',
                'type' => '3'
        ]);
    }
}
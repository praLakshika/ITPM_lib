<?php
use Illuminate\Database\Seeder;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('roles')->delete();
    
        // DB::table('roles')->insert([
        //     'id' => 3,
        //     'name' => 'Receptionist',
        //     'weight' => 0,
        // ]);
        // DB::table('roles')->insert([
        //     'id' => 4,
        //     'name' => 'Director',
        //     'weight' => 0,
        // ]);
        // DB::table('roles')->insert([
        //     'id' => 5,
        //     'name' => 'PNO',
        //     'weight' => 0,
        // ]);
        // DB::table('roles')->insert([
        //     'id' => 6,
        //     'name' => 'Doctor',
        //     'weight' => 0,
        // ]);
        DB::table('roles')->insert([
            'id' => 2,
            'name' => 'Patient',
            'weight' => 0,
        ]);
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

        DB::table('employees')->insert([
            'Did' => 'EMP0001',
            'name' => 'Buddika asanka',
            'nic' => '894564123',
            'employeeType' => 'administrator ',
            'emp_pic' => '1pic.jpeg ',
            'email' => 'buddikasspo@gmail.com',
            'contactNo' => '0713450257 '
        ]);
    }
}
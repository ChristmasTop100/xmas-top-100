<?php

use Illuminate\Database\Seeder;
use Symfony\Component\Yaml\Yaml;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (env('EMPLOYEE_FILE') && file_exists(env('EMPLOYEE_FILE'))) {
            $employees = Yaml::parse(file_get_contents(env('EMPLOYEE_FILE')));
        }

        if (isset($employees)) {
            collect($employees['employees'])->each(function($employee) {
                DB::table('users')->insert([
                  'name' => $employee['name'],
                  'email' => $employee['mail'],
                  'password' => bcrypt(str_random(20)),
                ]);
            });
        }
        else {
            DB::table('users')->insert([
              'name' => str_random(10),
              'email' => str_random(10) . '@gmail.com',
              'password' => bcrypt('secret'),
            ]);
        }
    }
}

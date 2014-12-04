<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/4/14
 * Time: 1:20 PM
 */

use Faker\Factory as Faker;
use App\User as User;



class UserTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        // DB::table('users')->delete();

        $faker = Faker::create();

        foreach(range(1, 5) as $index)
        {
            User::create([

                'email' => $faker->email,

                'password' =>  password_hash('testtest', PASSWORD_DEFAULT)

            ]);

        }
    }


}
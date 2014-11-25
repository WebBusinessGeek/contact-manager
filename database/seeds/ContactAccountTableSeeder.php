<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/25/14
 * Time: 4:02 PM
 */

use Faker\Factory as Faker;
use App\MyStuff\ContactAccount\ContactAccount as ContactAccount;

use Illuminate\Database\Capsule\Manager as DB;

class ContactAccountTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {

       // DB::table('contactAccounts' )->delete();

        $faker = Faker::create();

        foreach (range(1, 6) as $index) {
            ContactAccount::create([

                'nickname' => $faker->name,

                'user_id' => $faker->numberBetween(1, 3)


            ]);

        }

    }



}

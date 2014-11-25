<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/24/14
 * Time: 7:48 PM
 */

use Faker\Factory as Faker;
use App\MyStuff\ContactDirectory\Contact as Contact;
use Illuminate\Database\DatabaseManager as DB;


class ContactTableSeeder extends \Illuminate\Database\Seeder {

    public function run()
    {
        DB::table('contacts')->delete();

        $faker = Faker::create();

        foreach(range(1, 30) as $index)
        {
           Contact::create([

               'name' => $faker->name,

               'email' => $faker->email,

               'phone_number' => $faker->phoneNumber,

               'industry' => $faker->word,

               'role' => $faker->word,

               'contactRelation' => $faker->word,

               'contactAccount_id' => $faker->numberBetween(1, 6)



           ]);

        }
    }







}
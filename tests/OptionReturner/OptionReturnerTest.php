<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:08 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\OptionReturner\OptionReturner;

class OptionReturnerTest extends \PHPUnit_Framework_TestCase {

    public function test_optionReturner_stores_roles_as_a_property()
    {
        $OptionReturner = new OptionReturner();

        $this->assertEquals(true, is_array($OptionReturner->roles));
    }

    public function test_optionReturner_stores_industries_as_a_property()
    {
        $OptionReturner = new OptionReturner();

        $this->assertEquals(true, is_array($OptionReturner->industries));
    }

    public function test_optionReturner_stores_relations_as_a_property()
    {
        $OptionReturner = new OptionReturner();

        $this->assertEquals(true, is_array($OptionReturner->contactRelations));
    }

    public function test_optionReturner_has_correct_values_stored_first()
    {
        $OptionReturner = new OptionReturner();
        $this->assertEquals('Customer Support', $OptionReturner->roles[0]);
        $this->assertEquals('Agriculture', $OptionReturner->industries[0]);
        $this->assertEquals('Freelancer', $OptionReturner->contactRelations[0]);
    }

}

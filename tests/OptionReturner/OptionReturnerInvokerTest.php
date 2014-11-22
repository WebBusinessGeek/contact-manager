<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:38 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\Polymorphic\OptionReturner;
use App\MyStuff\Polymorphic\OptionReturnerInvoker;

class OptionReturnerInvokerTest extends \PHPUnit_Framework_TestCase {

    //call getAllRoles on a OptionReturner resource
    public function test_OptionReturnerInvoker_getAllRoles_retrieves_all_roles()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerInvoker = new OptionReturnerInvoker();

        $this->assertEquals(true, is_array($optionReturnerInvoker->getAllRoles($optionReturner)));

    }

    //call getSpecificRole on a OptionReturner resource (argument)
    public function test_OptionReturnerInvoker_getSpecificRole_retrieves_a_specific_role()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerInvoker = new OptionReturnerInvoker();

        $this->assertEquals('Customer Support', $optionReturnerInvoker->getSpecificRole($optionReturner, 1));
    }

    //call getAllIndustries on a OptionReturner resource
    public function test_OptionReturnerInvoker_getAllIndustries_retrieves_all_industries()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerInvoker = new OptionReturnerInvoker();

        $this->assertEquals(true, is_array($optionReturnerInvoker->getAllIndustries($optionReturner)));
    }

    //call getSpecificIndustry on a OptionReturner resource
    public function test_OptionReturnerInvoker_getSpecificIndustry_retrieves_a_specific_industry()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerInvoker = new OptionReturnerInvoker();

        $this->assertEquals('Agriculture', $optionReturnerInvoker->getSpecificIndustry($optionReturner, 1));
    }

    //call getAllRelations on a OptionReturner resource
    public function test_OptionReturnerInvoker_getAllRelations_retrieves_all_relations()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerInvoker = new OptionReturnerInvoker();

        $this->assertEquals(true, is_array($optionReturnerInvoker->getAllContactRelations($optionReturner)));
    }

    //call getSpecificRelations on a OptionReturner resource
    public function test_OptionReturnerInvoker_getSpecificRelation_retrieves_a_specific_relation()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerInvoker = new OptionReturnerInvoker();

        $this->assertEquals('Freelancer',$optionReturnerInvoker->getSpecificContactRelation($optionReturner, 1));
    }

}

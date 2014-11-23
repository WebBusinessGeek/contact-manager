<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:25 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\OptionReturner\OptionReturnerCommandController;

class OptionReturnerCommandControllerTest extends \PHPUnit_Framework_TestCase {


    public function test_OptionReturnerCC_getAllRoles_method_returns_all_roles()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals(true, is_array($optionReturnerCmmdCtrl->getAllRoles()));
        $this->assertEquals('Customer Support', $optionReturnerCmmdCtrl->getAllRoles()[0]);
    }


    public function test_OptionReturnerCC_getSpecificRole_method_returns_a_specific_role()
    {

    }

    //return all industries
    public function test_OptionReturnerCC_getAllIndustries_method_returns_all_industries()
    {

    }
    //return specific industry
    public function test_OptionReturnerCC_getSpecificIndustry_method_returns_a_specific_industry()
    {

    }
    //return all contact relations
    public function test_OptionReturnerCC_getAllRelations_method_returns_all_relations()
    {

    }
    //return specific contact relation
    public function test_OptionReturnerCC_getSpecificRelation_method_returns_a_specific_relation()
    {

    }
}

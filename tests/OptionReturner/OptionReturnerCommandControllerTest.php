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
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals('Customer Support', $optionReturnerCmmdCtrl->getSpecificRole(1));

        $this->setExpectedException('InvalidArgumentException', 'Key not found on property');

        $optionReturnerCmmdCtrl->getSpecificRole(20);

    }

    //return all industries
    public function test_OptionReturnerCC_getAllIndustries_method_returns_all_industries()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals(true, is_array($optionReturnerCmmdCtrl->getAllIndustries()));
        $this->assertEquals('Agriculture', $optionReturnerCmmdCtrl->getAllIndustries()[0]);
    }
    //return specific industry
    public function test_OptionReturnerCC_getSpecificIndustry_method_returns_a_specific_industry()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals('Agriculture', $optionReturnerCmmdCtrl->getSpecificIndustry(1));

        $this->setExpectedException('InvalidArgumentException', 'Key not found on property');

        $optionReturnerCmmdCtrl->getSpecificIndustry(20);
    }

    public function test_OptionReturnerCC_getAllRelations_method_returns_all_relations()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals(true, is_array($optionReturnerCmmdCtrl->getAllContactRelations()));
        $this->assertEquals('Freelancer', $optionReturnerCmmdCtrl->getAllContactRelations()[0]);
    }

    public function test_OptionReturnerCC_getSpecificRelation_method_returns_a_specific_relation()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals('Freelancer', $optionReturnerCmmdCtrl->getSpecificContactRelation(1));

        $this->setExpectedException('InvalidArgumentException', 'Key not found on property');

        $optionReturnerCmmdCtrl->getSpecificContactRelation(20);
    }

    public function test_OptionReturnerCC_ALL_getSpecific_methods_throws_error_if_argument_is_less_than_one()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals('Customer Support', $optionReturnerCmmdCtrl->getSpecificRole(1));

        $this->setExpectedException('InvalidArgumentException', 'Key must be greater than zero');

        $optionReturnerCmmdCtrl->getSpecificRole(0);

    }

    public function test_OptionReturnerCC_getSpecificIndustry_method_throws_error_if_argument_is_less_than_one()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals('Agriculture', $optionReturnerCmmdCtrl->getSpecificIndustry(1));

        $this->setExpectedException('InvalidArgumentException', 'Key must be greater than zero');

        $optionReturnerCmmdCtrl->getSpecificIndustry(0);
    }

    public function test_OptionReturnerCC_getSpecificContactRelations_method_throws_error_if_argument_is_less_than_one()
    {
        $optionReturnerCmmdCtrl = new OptionReturnerCommandController();

        $this->assertEquals('Freelancer', $optionReturnerCmmdCtrl->getSpecificContactRelation(1));

        $this->setExpectedException('InvalidArgumentException', 'Key must be greater than zero');

        $optionReturnerCmmdCtrl->getSpecificContactRelation(0);
    }


}

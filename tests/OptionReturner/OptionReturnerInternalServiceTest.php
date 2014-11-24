<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/24/14
 * Time: 5:15 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\OptionReturner\OptionReturnerInternalService;

class OptionReturnerInternalServiceTest extends \PHPUnit_Framework_TestCase {


    public function test_OptionReturnerInternalService_getEverything_method_gets_all_properties_and_values_on_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();

        $this->assertEquals(true, is_array($optionReturnerInternalService->getEverything()));
        $this->assertEquals('Customer Support', $optionReturnerInternalService->getEverything()[0][0]);

    }


    public function test_OptionReturnerInternalService_getAllRoles_gets_all_values_for_roles_on_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();
        $this->assertEquals(true, is_array($optionReturnerInternalService->getAllRoles()));
        $this->assertEquals('Customer Support', $optionReturnerInternalService->getAllRoles()[0]);
    }

    public function test_OptionReturnerInternalService_getSpecificRole_gets_a_specific_role_from_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();
        $this->assertEquals('Customer Support', $optionReturnerInternalService->getSpecificRole(1));

        $this->setExpectedException('InvalidArgumentException', 'Key not found on property');
        $optionReturnerInternalService->getSpecificRole(20);
    }

    public function test_OptionReturnerInternalService_getAllIndustries_gets_all_values_for_industries_on_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();
        $this->assertEquals(true, is_array($optionReturnerInternalService->getAllIndustries()));
        $this->assertEquals('Agriculture', $optionReturnerInternalService->getAllIndustries()[0]);
    }

    public function test_OptionReturnerInternalService_getSpecificIndustry_gets_a_specific_industry_from_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();
        $this->assertEquals('Agriculture', $optionReturnerInternalService->getSpecificIndustry(1));

        $this->setExpectedException('InvalidArgumentException', 'Key not found on property');
        $optionReturnerInternalService->getSpecificIndustry(90);
    }

    public function test_OptionReturnerInternalService_getAllContactRelations_gets_all_values_for_contactRelations_on_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();
        $this->assertEquals(true, is_array($optionReturnerInternalService->getAllContactRelations()));
        $this->assertEquals('Freelancer', $optionReturnerInternalService->getAllContactRelations()[0]);
    }

    public function test_OptionReturnerInternalService_getSpecificContactRelation_gets_a_specific_contactRelation_from_OptionReturner_class()
    {
        $optionReturnerInternalService = new OptionReturnerInternalService();
        $this->assertEquals('Freelancer', $optionReturnerInternalService->getSpecificContactRelation(1));

        $this->setExpectedException('InvalidArgumentException', 'Key not found on property');
        $optionReturnerInternalService->getSpecificContactRelation(90);
    }





}

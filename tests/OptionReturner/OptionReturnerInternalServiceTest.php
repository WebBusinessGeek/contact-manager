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


//getAll*()
//getSpecific*()




}

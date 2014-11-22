<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 11:10 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\OptionReturner\OptionReturner;
use App\MyStuff\OptionReturner\OptionReturnerValidator;

class OptionReturnerValidatorTest extends \PHPUnit_Framework_TestCase {


    public function test_optionReturnerValidator_keyExistsInPropertyArray_method_returns_boolean_if_key_exists_in_property_array()
    {
        $optionReturner = new OptionReturner();

        $optionReturnerValidator = new OptionReturnerValidator();

        $this->assertEquals(true, $optionReturnerValidator->keyExistsInPropertyArray($optionReturner, 'roles', 1));
        $this->assertEquals(false, $optionReturnerValidator->keyExistsInPropertyArray($optionReturner, 'roles', 85));
    }

    //check if value is roles, industries, or contactRelations


}

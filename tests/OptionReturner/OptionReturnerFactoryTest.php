<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:32 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\Polymorphic\OptionReturner;
use App\MyStuff\Polymorphic\OptionReturnerFactory;

class OptionReturnerFactoryTest extends \PHPUnit_Framework_TestCase {

    public function test_OptionReturnerFactory_createNewOptionReturner_method_returns_new_OptionReturner()
    {
        $optionReturnerFactory = new OptionReturnerFactory();

        $this->assertEquals(new OptionReturner(),$optionReturnerFactory->createNewOptionReturner());
    }

}

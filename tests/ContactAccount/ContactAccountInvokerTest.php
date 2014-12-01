<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/1/14
 * Time: 1:28 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
use App\MyStuff\ContactAccount\ContactAccountInvoker;

class ContactAccountInvokerTest extends \PHPUnit_Framework_TestCase {

    public function test_contactAccountInvoker_addNameToContactAccount_method_adds_a_name_to_contactAccount_resource()
    {
        $contactAccountInvoker = new ContactAccountInvoker();

        $contactAccount = new ContactAccount();

        $this->assertEquals(null, $contactAccount->nickname);

        $contactAccountInvoker->addNicknameToContactAccount($contactAccount, 'SomeName');

        $this->assertEquals('SomeName', $contactAccount->nickname);
    }

}

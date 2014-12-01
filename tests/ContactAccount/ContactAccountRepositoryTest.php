<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 7:50 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccountRepository;
use Illuminate\Foundation\Testing\TestCase;

class ContactAccountRepositoryTest extends \TestCase {

    public function test_contactAccountRepo_getAllContactAccountsRelatedToUser_gets_all_contactAccounts_associated_with_user()
    {
        $contactAccountRepo = new ContactAccountRepository();

        $accounts = $contactAccountRepo->getAllContactAccountsRelatedToUser(1);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($accounts[0]));

        $noAccounts = $contactAccountRepo->getAllContactAccountsRelatedToUser(1394209348209380948);
        $this->assertEquals(0, count($noAccounts));


    }

}

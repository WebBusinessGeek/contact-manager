<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 7:50 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
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

    public function test_contactAccountRepository_storeContactAccount_method_stores_a_contactAccount_in_contactAccounts_db_table()
    {
        $contactAccountRepo = new ContactAccountRepository();

        $contactAccount = new ContactAccount();

        $contactAccountRepo->storeContactAccount(10293203, $contactAccount);

        $contactAccountFromDatabase = $contactAccountRepo->getAllContactAccountsRelatedToUser(10293203);

        $this->assertEquals(get_class($contactAccount), get_class($contactAccountFromDatabase[0]));
        $this->assertEquals($contactAccount->user_id, $contactAccountFromDatabase[0]->user_id);

    }

    public function test_contactAccountRepository_getContactAccountByNickname_method_retrieves_a_contactAccount_resource_that_matches_from_DB()
    {
        $contactAccountRepo = new ContactAccountRepository();

        $contactAccount = new ContactAccount();

        $contactAccount->nickname = 'ThisIsANicknameForDays12830948203';

        $contactAccountRepo->storeContactAccount(1032933, $contactAccount);

        $contactAccountAfterStorage = $contactAccountRepo->getContactAccountByNickname(1032933,'ThisIsANicknameForDays12830948203');

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccountAfterStorage));
        $this->assertEquals('ThisIsANicknameForDays12830948203', $contactAccountAfterStorage->nickname);
        $this->assertEquals(1032933, $contactAccountAfterStorage->user_id);

    }


    public function test_contactAccountRepository_getContactAccountById_method_retrieves_a_matching_contactAccount_resource_from_DB()
    {
        $contactAccountRepo = new ContactAccountRepository();

        $contactAccount = $contactAccountRepo->getContactAccountById(1);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccount));
        $this->assertEquals(1, $contactAccount->id);
    }

}

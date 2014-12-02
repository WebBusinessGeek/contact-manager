<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/30/14
 * Time: 7:05 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
use App\MyStuff\ContactAccount\ContactAccountCommandController;
use App\MyStuff\ContactDirectory\ContactCommandController;
use Illuminate\Foundation\Testing\TestCase;
use tests\Contact\ContactCommandControllerTest;

class ContactAccountCommandControllerTest extends \TestCase{

    public function test_ContactAccountCmmdCtrl_index_method_retrieves_all_accounts_associated_with_a_user()
    {
        $contactAccountCmmdCtrl = new ContactAccountCommandController();

        $accounts = $contactAccountCmmdCtrl->index(1);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($accounts[0]));

        $noAccounts = $contactAccountCmmdCtrl->index(1242039520952039);
        $this->assertEquals('No accounts associated with that user', $noAccounts);
    }


    public function test_ContactAccountCmmdCtrl_store_method_creates_and_stores_a_new_resource_in_contactAccount_DB_table()
    {
        $contactAccountCommdCtrol = new ContactAccountCommandController();

        $contactAccountCommdCtrol->store(1339320, 'SomeCrazyNickName334');

        $contactAccount = $contactAccountCommdCtrol->repository->getContactAccountByNickname(1339320, 'SomeCrazyNickName334');

        $this->assertEquals('SomeCrazyNickName334', $contactAccount->nickname);
    }

    public function test_ContactAccountCmmdCtrl_show_method_retrieves_a_specified_account_associated_with_a_user_and_its_contacts()
    {
        $contactAccountCmmdCtrl = new ContactAccountCommandController();

        $contactAccount = $contactAccountCmmdCtrl->show(1);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccount));
        $this->assertEquals(1, $contactAccount->id);

        $contactAccount2 = $contactAccountCmmdCtrl->show(2);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccount2));
        $this->assertEquals(2, $contactAccount2->id);


        $this->assertEquals('No Contact Account by that id', $contactAccountCmmdCtrl->show('absjdlkfjwe'));


    }

    public function test_ContactAccountCmmdCtrl_update_method_changes_a_contactAccount_resource_stored_in_the_DB_table()
    {

    }

    public function test_ContactAccountCmmdCtrl_destroy_method_deletes_a_contactAccount_resource_from_DB()
    {
        $contactAccountCmmdCtrl = new ContactAccountCommandController();

        $contactAccountCmmdCtrl->store(34443, 'ThisIsFromTheDestroyMethod');

        $contactFromDB = $contactAccountCmmdCtrl->repository->getContactAccountByNickname(34443, 'ThisIsFromTheDestroyMethod');
        $this->assertEquals('ThisIsFromTheDestroyMethod', $contactFromDB->nickname);
        $this->assertEquals(34443, $contactFromDB->user_id);


        $contactAccountCmmdCtrl->destroy($contactFromDB->id);


        $afterDeleteContactAccount = $contactAccountCmmdCtrl->repository->getContactAccountByNickname(34443, 'ThisIsFromTheDestroyMethod');
        $this->assertEquals(null, $afterDeleteContactAccount);

        $notAContactAccountCheck = $contactAccountCmmdCtrl->destroy(3290430294333834384398);
        $this->assertEquals('No Contact Account by that id', $notAContactAccountCheck);
    }

}

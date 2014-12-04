<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 12/3/14
 * Time: 12:52 PM
 */

namespace tests\ContactAccount;


use App\MyStuff\ContactAccount\ContactAccount;
use App\MyStuff\ContactAccount\ContactAccountCommandController;
use App\MyStuff\ContactAccount\ContactAccountInternalService;
use Illuminate\Foundation\Testing\TestCase;

class ContactAccountInternalServiceTest extends \TestCase {

    public function test_contactAccountInternalService_index_method_returns_all_contactAccounts_related_to_instance()
    {
        $contactAccountInternalService = new ContactAccountInternalService();

        $contactAccountCmmdCtrl = new ContactAccountCommandController();
        $contactAccount1 = new ContactAccount();
        $contactAccount2 = new ContactAccount();
        $contactAccount3 = new ContactAccount();

        $contactAccounts = [
            $contactAccount1,
            $contactAccount2,
            $contactAccount3
        ];

        for($x = 0; $x < count($contactAccounts); $x++)
        {
            $contactAccountCmmdCtrl->store(38898811, 'contactAccountInternalService@indexMethodTest'.$x);
        }

        $contactAccounts = $contactAccountInternalService->index(38898811);

        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccounts[0]));
        $this->assertEquals(38898811, $contactAccounts[0]->user_id);
        $this->assertEquals('No accounts associated with that user', $contactAccountInternalService->index('asdf3943fsdkf'));
    }

    public function test_contactAccountInternalService_store_method_stores_a_contact_in_the_database_table()
    {

        $contactAccountInternalService = new ContactAccountInternalService();


        $contactAccountInternalService->store(85545594, 'contactAccountInternalService@storeMethodTest1');


        $afterStoreContactAccount = $contactAccountInternalService->commandController
            ->repository->getContactAccountByNickname(85545594, 'contactAccountInternalService@storeMethodTest1');


        $this->assertEquals(85545594, $afterStoreContactAccount->user_id);
        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($afterStoreContactAccount));
        $this->assertEquals('contactAccountInternalService@storeMethodTest1', $afterStoreContactAccount->nickname);
    }

    public function test_contactAccountInternalService_show_method_retrieves_specified_contactAccount_or_gives_error_message()
    {
        //create a contactAccount
        $contactAccountInternalService = new ContactAccountInternalService();

        $contactAccountInternalService->store(40349, 'contactAccountInternalService@showMethodTest1');

        //retrieve it by name to get the id
        $contactAccount = $contactAccountInternalService->commandController->
        repository->getContactAccountByNickname(40349, 'contactAccountInternalService@showMethodTest1');

        //call the show method using the id
        $contactAccountFromShowMethod = $contactAccountInternalService->show($contactAccount->id);

        //assert its name, class, and user_id
        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccountFromShowMethod));
        $this->assertEquals('contactAccountInternalService@showMethodTest1', $contactAccountFromShowMethod->nickname);
        $this->assertEquals(40349, $contactAccountFromShowMethod->user_id);

        //call show method on bad id - and assert the result is an error message
        $this->assertEquals('No Contact Account by that id', $contactAccountInternalService->show('asdfasdfewer'));
    }



    public function test_contactAccountInternalService_update_method_updates_the_nickname_of_specified_contactAccount()
    {
        //create a contactAccount
        $contactAccountInternalService = new ContactAccountInternalService();

        $contactAccountInternalService->store(880990, 'contactAccountInternalService@updateMethodTest1');

        //retrieve it by name to get the id
        $contactAccountPreUpdate = $contactAccountInternalService->commandController->repository->getContactAccountByNickname(880990, 'contactAccountInternalService@updateMethodTest1');

        //call the update method on it with the id
        $contactAccountInternalService->update($contactAccountPreUpdate->id,'contactAccountInternalService@updateMethodTest2');

        //retrieve it with show
        $contactAccountPostUpdate = $contactAccountInternalService->show($contactAccountPreUpdate->id);

        //assert its name, class, and user_id
        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccountPostUpdate));
        $this->assertEquals('contactAccountInternalService@updateMethodTest2', $contactAccountPostUpdate->nickname);
        $this->assertEquals(880990, $contactAccountPostUpdate->user_id);

        //call update on bad id - assert the result is an error message
        $this->assertEquals('No Contact Account by that id', $contactAccountInternalService->update('skdjfweirwo', 'wont go through'));
    }


    public function test_contactAccountInternalService_destroy_method_deletes_a_contactAccount_instance_from_the_database_table()
    {
        //create a contactAccount
        $contactAccountInternalService = new ContactAccountInternalService();

        $contactAccountInternalService->store(450097, 'contactAccountInternalService@destroyMethodTest1');

        //retrieve it and assert its nickname, and user_id to prove its in the database
        $contactAccountPreDelete = $contactAccountInternalService->commandController->repository->getContactAccountByNickname(450097,'contactAccountInternalService@destroyMethodTest1');
        $this->assertEquals('App\MyStuff\ContactAccount\ContactAccount', get_class($contactAccountPreDelete));
        $this->assertEquals('contactAccountInternalService@destroyMethodTest1', $contactAccountPreDelete->nickname);
        $this->assertEquals(450097, $contactAccountPreDelete->user_id);

        //call the destroy method on its id
        $contactAccountInternalService->destroy($contactAccountPreDelete->id);

        //attempt to retrieve it again by its id - prove its no longer in the database
        $contactAccountPostDelete = $contactAccountInternalService->show($contactAccountPreDelete->id);
        $this->assertEquals('No Contact Account by that id', $contactAccountPostDelete);

        //call the destroy method on a bad id - assert the result is an error message
        $this->assertEquals('No Contact Account by that id' , $contactAccountInternalService->destroy('adsfdweir'));
    }

}

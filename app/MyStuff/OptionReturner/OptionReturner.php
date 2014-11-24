<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:03 PM
 */

namespace App\MyStuff\OptionReturner;


class OptionReturner {

    //**** remember to add any new group of options
    //1. Add a new public property array below
    //2. Add the new group to the OptionReturnerValidator->allowProperties property
    //3. Add getAll and getSpecific methods in OptionReturnerInvoker class
    //4. Add getAll and getSpecific methods in OptionReturnerCommandController class
    //5. Add to options array on OptionReturnerInternalService class
    //6. Should be building with tests first - but if not, back up with tests!!!


    /**
     * The values acceptable for Roles in application
     * @var array
     */
    public $roles = [
        //Customer Support must be the first value or things will break!
        'Customer Support',

        'Admin Support',

        'Marketing',

        'Sales',

        'Developer',

        'Designer',

        'IT',

        'Management'


    ];


    /**
     * The values acceptable for Industries in application
     * @var array
     */
    public $industries = [
        //Agriculture must be first or things will break!
        'Agriculture',

        'Accounting',

        'Advertising',

        'Aerospace',

        'Aircraft',

        'Airline',

        'Apparel & Accessories',


    ];


    /**
     * The values acceptable for Contact Relations in application
     * @var array
     */
    public $contactRelations = [
        //Freelance must be first or things will break!
        'Freelancer',

        'Consultant',

        'Employee',

        'Vendor',

        'Investor',

        'Partner',



    ];
    //**** remember to add any new group of options
    //1. Add a new public property array below
    //2. Add the group to the OptionReturnerValidator->allowProperties property
    //3. Add getAll and getSpecific methods in OptionReturnerInvoker class
    //4. Add getAll and getSpecific methods in OptionReturnerCommandController class
    //5. Add to options array on OptionReturnerInternalService class
    //6. Should be building with tests first - but if not, back up with tests!!!

}
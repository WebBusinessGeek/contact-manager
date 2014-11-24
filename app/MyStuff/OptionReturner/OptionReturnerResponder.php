<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 7:05 PM
 */

namespace App\MyStuff\OptionReturner;


use App\MyStuff\Polymorphic\ResponderTrait;
use Psr\Log\InvalidArgumentException;

class OptionReturnerResponder {

    use ResponderTrait;

    public function throwBadKeyException()
    {
        throw new InvalidArgumentException('Key not found on property.');
    }

}
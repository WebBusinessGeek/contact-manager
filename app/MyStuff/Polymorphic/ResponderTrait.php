<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 10:14 PM
 */

namespace App\MyStuff\Polymorphic;


trait ResponderTrait {


    /**
     * Send a dynamic message
     * @param $message
     * @return mixed
     */
    public function sendMessage($message)
    {
        return $message;
    }


    /**
     * Send a message as an associative array with a dynamic key
     * @param $key
     * @param $message
     * @return array
     */
    public function sendMessageAsArray($key, $message)
    {
        return [$key => $message];
    }


    /**
     * Send a message as JSON with a dynamic key
     * @param $key
     * @param $message
     * @return string
     */
    public function sendMessageAsJSON($key, $message)
    {
        return json_encode([$key => $message]);
    }


    /**
     * Send two messages as an associative array with 2 dynamic keys
     * @param $key1
     * @param $message1
     * @param $key2
     * @param $message2
     * @return array
     */
    public function sendMessagesAsArray($key1, $message1, $key2, $message2)
    {
        return [ $key1 => $message1 , $key2 => $message2 ];
    }


    /**
     * Send two messages as JSON with 2 dynamic keys
     * @param $key1
     * @param $message1
     * @param $key2
     * @param $message2
     * @return string
     */
    public function sendMessagesAsJSON($key1, $message1, $key2, $message2)
    {
        return json_encode([ $key1 => $message1 , $key2 => $message2 ]);
    }


}
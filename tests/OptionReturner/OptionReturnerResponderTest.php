<?php
/**
 * Created by PhpStorm.
 * User: MacBookEr
 * Date: 11/21/14
 * Time: 10:17 PM
 */

namespace tests\OptionReturner;


use App\MyStuff\OptionReturner\OptionReturnerResponder;

class OptionReturnerResponderTest extends \PHPUnit_Framework_TestCase {

    //send message
    public function test_optionReturnerResponder_sendMessage_will_send_a_message_passed_in()
    {
        $optionReturnerResponder = new OptionReturnerResponder();

        $this->assertEquals('Sample message', $optionReturnerResponder->sendMessage('Sample message'));
    }

    //send message as array with dynamic key
    public function test_optionReturnerResponder_sendMessageAsArray_will_send_a_associativeArray_with_dynamic_key()
    {
        $optionReturnerResponder = new OptionReturnerResponder();

        $this->assertEquals(true, is_array($optionReturnerResponder->sendMessageAsArray('key', 'message')));
    }

    //send message as json with dynamic key
    public function test_optionReturnerResponder_sendMessageAsJSON_will_send_a_associativeArray_as_json()
    {
        $optionReturnerResponder = new OptionReturnerResponder();

        $array = ['key' => 'message'];

        $this->assertJsonStringEqualsJsonString(json_encode($array), $optionReturnerResponder->sendMessageAsJSON('key', 'message'));
    }

    //send 2 messages as array with dynamic keys
    public function test_optionReturnerResponder_sendMessagesAsArray_will_send_2_messages_with_2_dynamic_keys()
    {
        $optionReturnerResponder = new OptionReturnerResponder();

        $array = $optionReturnerResponder->sendMessagesAsArray('key1', 'message1', 'key2', 'message2');

        $this->assertEquals(true, is_array($array));

        $this->assertEquals('message1', $array['key1']);
        $this->assertEquals('message2', $array['key2']);
    }
    //send 2 messages as json with dynamic keys
    public function test_optionReturnerResponder_sendMessagesAsJSON_will_send_2_messages_with_2_dynamic_keys_as_json()
    {
        $optionReturnerResponder = new OptionReturnerResponder();

        $array = ['key1' => 'message1', 'key2' => 'message2'];

        $this->assertJsonStringEqualsJsonString(json_encode($array), $optionReturnerResponder->sendMessagesAsJSON('key1', 'message1', 'key2', 'message2'));
    }

}

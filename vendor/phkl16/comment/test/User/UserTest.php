<?php

namespace Anax\User;

/**
 * Test cases for class CommentController.
 */
class UserTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to construct object and verify that the object
     * has the expected properties due various ways of constructing
     * it.
     */

    protected $di;
    protected $user;
    /**
    * Test cases requires DI-container, therefore save in constructor
    */
    public function setUp()
    {
         $this->di = new \Anax\DI\DIFactoryConfig("diTest.php");
         $this->user = new User();
         $this->user->setDb($this->di->get("db"));
    }

    public function testCreateObject()
    {
        //$user = new User();
        $this->assertInstanceOf("\Anax\User\User", $this->user);
    }

    public function testPassword()
    {
        $returnData = $this->user->getUserData("doe");
        $this->user->setPassword("password");
        $passwordValue = $this->user->verifyPassword("doe", "doe");

        $this->assertEquals($passwordValue, true);
    }

    public function testGetUserData()
    {
        $returnData = $this->user->getUserData("doe");
        $this->assertEquals("doe@gmail.com", $returnData->email);
    }
}

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
         $this->user->acronym = "doe";
         $this->user->setPassword("doe");
         $this->user->email = "doe@gmail.com";
         $this->user->save();
    }

    public function deleteUser()
    {
        $this->user->delete($this->di->get("db")->lastInsertId());
    }

    public function testCreateObject()
    {
        //$user = new User();
        $this->assertInstanceOf("\Anax\User\User", $this->user);
        $this->deleteUser();
    }

    public function testPassword()
    {
        $this->user->getUserData("doe");
        $passwordValue = $this->user->verifyPassword("doe", "doe");

        $this->assertEquals($passwordValue, true);
        $this->deleteUser();
    }

    public function testGetUserData()
    {
        $returnData = $this->user->getUserData("doe");
        $this->assertEquals("doe@gmail.com", $returnData->email);
        $this->deleteUser();
    }
}

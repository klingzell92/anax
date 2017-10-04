<?php

namespace Anax\User\HTMLForm;

use Anax\User\User;

/**
 * Test cases for class CommentController.
 */
class UserLoginFormTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to construct object and verify that the object
     * has the expected properties due various ways of constructing
     * it.
     */

    protected $di;
    protected $login;
     /**
      * Setting up di and login
      */
    public function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("diTest.php");
        $this->login = new UserLoginForm($this->di);
    }

    /**
    * Test the comment object is an instance of the Comment class
    */
    public function testCreateObject()
    {
        $this->assertInstanceOf("\Anax\User\HTMLForm\UserLoginForm", $this->login);
    }
}

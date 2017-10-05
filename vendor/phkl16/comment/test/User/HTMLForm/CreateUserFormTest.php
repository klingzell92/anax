<?php

namespace Anax\User\HTMLForm;

/**
 * Test cases for class CommentController.
 */
class CreateUserFormTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to construct object and verify that the object
     * has the expected properties due various ways of constructing
     * it.
     */

    protected $di;
    protected $create;
     /**
      * Setting up di and login
      */
    public function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("diTest.php");
        $this->create = new CreateUserForm($this->di);
    }

    /**
    * Test the comment object is an instance of the Comment class
    */
    public function testCreateObject()
    {
        $this->assertInstanceOf("\Anax\User\HTMLForm\CreateUserForm", $this->create);
    }
}

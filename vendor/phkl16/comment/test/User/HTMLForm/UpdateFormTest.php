<?php

namespace Anax\User\HTMLForm;

use Anax\User\User;

/**
 * Test cases for class CommentController.
 */
class UpdateFormtTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to construct object and verify that the object
     * has the expected properties due various ways of constructing
     * it.
     */

    protected $di;
    protected $update;
     /**
      * Setting up di and a user
      */
    public function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("diTest.php");
        $this->user = new User();
        $this->user->setDb($this->di->get("db"));
        $this->user->acronym = "Test";
        $this->user->email = "test@gmail.com";
        $this->user->setPassword("Test");
        $this->user->save();
    }

    public function deleteUser()
    {
        $this->user->delete($this->di->get("db")->lastInsertId());
    }

    /**
    * Test the comment object is an instance of the Comment class
    */
    public function testCreateObject()
    {
        $this->update = new UpdateForm($this->di, $this->di->get("db")->lastInsertId());
        $this->assertInstanceOf("\Anax\User\HTMLForm\UpdateForm", $this->update);
        $this->deleteUser();
    }
}

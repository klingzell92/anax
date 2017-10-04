<?php

namespace Anax\Comment;

/**
 * Test cases for class CommentController.
 */
class CommentTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test case to construct object and verify that the object
     * has the expected properties due various ways of constructing
     * it.
     */

    protected $di;
    protected $comment;
     /**
      * Test cases requires DI-container, therefore save in constructor
      */
    public function setUp()
    {
        $this->di = new \Anax\DI\DIFactoryConfig("diTest.php");
        $this->comment = new Comment();
        $this->comment->setDb($this->di->get("db"));
    }

    /**
    * Test the comment object is an instance of the Comment class
    */
    public function testCreateObject()
    {
        $comment = new Comment();
        $this->assertInstanceOf("\Anax\Comment\Comment", $comment);
    }
    
    /**
    * Test the convertEmail function
    */
    public function testComment()
    {
        //var_dump($this->comment);
        $gravatar =  "https://www.gravatar.com/avatar/".$this->comment->convertEmail("doe@gmail.com");
        //var_dump($this->comment->db->lastInsertId());

        $this->comment->addComment("doe", "Hej", $gravatar);
        $id = $this->di->get("db")->lastInsertId();
        $this->comment->updateComment($id, "doe", "TestarTestarTestar", $gravatar);
        //$comment = $this->comment->find("content", "TestarTestarTestar");
        $this->comment->deletePost($id);
        $test = "https://www.gravatar.com/avatar/".md5(strtolower(trim("doe@gmail.com")));
        $this->assertEquals($test, $gravatar);
    }
}

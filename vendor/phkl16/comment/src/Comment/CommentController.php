<?php

namespace Anax\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;
use \Anax\Comment\Comment;

/**
 * A controller for the Comment module
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommentController implements InjectionAwareInterface
{
    use InjectionAwareTrait;


    //private $started = false;

    /**
     * Start the session.
     *
     * @return void
     */
     /*
    public function start()
    {

        if (session_status() == PHP_SESSION_NONE) {
            $this->di->get("session")->start();
        }
        if (!$this->di->get("comment")->hasComments()) {
            $this->di->get("comment")->init();
        }
        $this->started = true;
    }
    */


    /**
     * Destroy the session.
     *
     * @return void
     */
     /*
    public function destroy()
    {
        $this->di->get("session")->destroy();
        exit;
    }*/



    /**
     * Create a new item by getting the entry from the request body and add
     * to the dataset.
     *
     * @return void
     */
    public function postComment()
    {
        $session = $this->di->get("session");
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $username = $session->get("username");
        $content = getPost("comment");
        $gravatar = "https://www.gravatar.com/avatar/" . $comment->convertEmail($session->get("email"));
        $comment->addComment($username, $content, $gravatar);
        $this->di->get("response")->redirect("comment");
    }

    /**
     * Get comments
     *
     * @return array
     */

    public function showComments()
    {
        //$this->start();
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $this->di->get("view")->add("comment/comment", [
         "comments" => $comment->findAll()
        ]);

       // Render a standard page using layout
        $this->di->get("pageRender")->renderPage([
            "title" => "Comment",
        ]);
    }

    /**
     * Edit a post
     *
     * @param string $postId for the post to edit
     *
     * @return void
     */

    public function showEdit($postId)
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $this->di->get("view")->add("comment/edit", [
         "values" => $comment->find("id", $postId)
        ]);

       // Render a standard page using layout
        $this->di->get("pageRender")->renderPage([
            "title" => "Edit",
        ]);
    }

    /**
     * Save the edited post
     *
     * @return void
     */

    public function saveEdit()
    {
        $session = $this->di->get("session");
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $id = getPost("id");
        $user = getPost("user");
        $content = getPost("comment");
        $gravatar = "https://www.gravatar.com/avatar/" . $comment->convertEmail($session->get("email"));
        $comment->updateComment($id, $user, $content, $gravatar);
        $this->di->get("response")->redirect("comment");
    }

    /**
     * Delete a post
     *
     * @param string $postId for the post to delete
     *
     * @return void
     */

    public function deletePost($postId)
    {
        $comment = new Comment();
        $comment->setDb($this->di->get("db"));
        $comment->deletePost($postId);
        $this->di->get("response")->redirect("comment");
    }
}

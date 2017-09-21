<?php

namespace Anax\Comment;

use \Anax\DI\InjectionAwareInterface;
use \Anax\DI\InjectionAwareTrait;

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



    /**
     * Destroy the session.
     *
     * @return void
     */
    public function destroy()
    {
        $this->di->get("session")->destroy();
        exit;
    }



    /**
     * Create a new item by getting the entry from the request body and add
     * to the dataset.
     *
     * @return void
     */
    public function postComment()
    {
        $email = getPost("email");
        $comment = getPost("comment");
        $gravatar = "https://www.gravatar.com/avatar/" . $this->di->get("comment")->convertEmail(getPost("email"));
        $this->di->get("comment")->addComment($email, $comment, $gravatar);
        $this->showComments();
    }

    /**
     * Get comments
     *
     * @return array
     */
    public function showComments()
    {
        $this->start();
        $this->di->get("view")->add("comment/comment", [
         "comments" => $this->di->get("comment")->getComments()
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
        $this->di->get("view")->add("comment/edit", [
         "values" => $this->di->get("comment")->getPostValues($postId)
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
        $id = getPost("id");
        $email = getPost("email");
        $comment = getPost("comment");
        $gravatar = "https://www.gravatar.com/avatar/" . $this->di->get("comment")->convertEmail(getPost("email"));
        $this->di->get("comment")->updateComment($id, $email, $comment, $gravatar);
        $this->showComments();
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
        $this->di->get("comment")->deletePost($postId);
        $this->showComments();
    }
}

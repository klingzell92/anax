<?php

namespace Anax\Comment;

use \Anax\Common\AppInjectableInterface;
use \Anax\Common\AppInjectableTrait;

/**
 * A controller for the Comment module
 *
 * @SuppressWarnings(PHPMD.ExitExpression)
 */
class CommentController implements AppInjectableInterface
{
    use AppInjectableTrait;



    /**
     * Start the session.
     *
     * @return void
     */
    public function start()
    {
        $this->app->session->start();
        if (!$this->app->comment->hasComments()) {
            $this->app->comment->init();
        }
    }



    /**
     * Destroy the session.
     *
     * @return void
     */
    public function destroy()
    {
        $this->app->session->destroy();
        $this->app->response->sendJson(["message" => "The session was destroyed."]);
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
        $gravatar = "https://www.gravatar.com/avatar/" . $this->app->comment->convertEmail(getPost("email"));
        $page = $this->app->url->create("comment");
        $this->app->comment->addComment($email, $comment, $gravatar, $page);
        $this->app->redirect("comment");
    }

    /**
     * Get comments
     *
     * @return array
     */
    public function getComments()
    {
        return $this->app->comment->getComments();
    }


    /**
     * Delete an item from the dataset.
     *
     * @param string $key    for the dataset
     * @param string $itemId for the item to delete
     *
     * @return void
     */
    public function deleteItem($key, $itemId)
    {
        $this->app->rem->deleteItem($key, $itemId);
        $this->app->response->sendJson(null);
        exit;
    }
}

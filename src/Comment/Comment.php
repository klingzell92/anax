<?php

namespace Anax\Comment;

use \Anax\Configure\ConfigureInterface;
use \Anax\Configure\ConfigureTrait;

/**
 * Comment module
 */
class Comment implements ConfigureInterface
{
    use ConfigureTrait;



    /**
     * @var array $session inject a reference to the session.
     */
    private $session;



    /**
     * @var string $key to use when storing in session.
     */
    const KEY = "comments";

    /**
     * Inject dependencies.
     *
     * @param array $dependency key/value array with dependencies.
     *
     * @return self
     */
    public function injectSession($session)
    {
        $this->session = $session;
        return $this;
    }

    /**
     * Fill the session with array to store comments
     *
     * @return self
     */
    public function init()
    {
        $comments = [];
        $this->session->set(self::KEY, $comments);
        return $this;
    }

    /**
     * Check if there is a comments array stored
     *
     * @return boolean tru if array exists in session, else false
     */
    public function hasComments()
    {
        return($this->session->has(self::KEY));
    }


    /**
     * Add a comment to the session.
     *
     * @param string $email
     * @param string $content
     * @param string $gravatar
     *
     * @return void
     */
    public function addComment($email, $content, $gravatar)
    {
        $id = 0;
        $comments = $this->session->get(self::KEY);
        if (!empty($comments)) {
            $last = end($comments);
            $id = $last[0]  + 1;
        }
        $comment = [$id, $email, $gravatar, $content];
        array_push($comments, $comment);
        $this->session->set(self::KEY, $comments);
        return $comment;
    }


    /**
     * Add an item to a dataset.
     *
     * @return array
     */
    public function getComments()
    {
        return $this->session->get(self::KEY);
    }

    /**
     * Convert email to md5 string
     *
     * @return string
     */
    public function convertEmail($email)
    {
        return md5(strtolower(trim($email)));
    }

    /**
    * Delete post
    *@param int id
    *
    *@return void
    */
    public function deletePost($id)
    {
        $comments = $this->session->get(self::KEY);
        unset($comments[$id]);
        $this->session->set(self::KEY, $comments);
    }

    /**
     * Update Comment
     *
     * @param int $id
     * @param string $email
     * @param string $content
     * @param string $gravatar
     *
     * @return void
     */
    public function updateComment($id, $email, $content, $gravatar)
    {
        $comments = $this->session->get(self::KEY);
        $comments[$id] = [$id, $email, $gravatar, $content];
        $this->session->set(self::KEY, $comments);
        return $comments;
    }

    /**
    * Delete post
    *@param int id
    *
    *@return array
    */
    public function getPostValues($id)
    {
        $comments = $this->session->get(self::KEY);
        $values = $comments[$id];
        return $values;
    }
}

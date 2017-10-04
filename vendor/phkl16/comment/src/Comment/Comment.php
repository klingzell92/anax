<?php

namespace Anax\Comment;

use \Anax\Database\ActiveRecordModel;

/**
 * A database driven model.
 */
class Comment extends ActiveRecordModel
{

    /**
     * @var string $tableName name of the database table.
     */
    protected $tableName = "Comment";

    /**
     * Columns in the table.
     *
     * @var integer $id primary key auto incremented.
     */
    public $id;
    public $user;
    public $gravatar;
    public $content;

    /**
     * Add a comment to the session.
     *
     * @param string $username
     * @param string $comment
     * @param string $gravatar
     *
     * @return void
     */
    public function addComment($username, $comment, $gravatar)
    {
        $this->user  = $username;
        $this->content = $comment;
        $this->gravatar = $gravatar;
        $this->save();
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
        $this->delete($id);
    }

    /**
     * Update Comment
     *
     * @param int $id
     * @param string $user
     * @param string $content
     * @param string $gravatar
     *
     * @return void
     */
    public function updateComment($id, $user, $content, $gravatar)
    {
        $this->find("id", $id);
        $this->user = $user;
        $this->content = $content;
        $this->gravatar = $gravatar;
        $this->save();
    }
}

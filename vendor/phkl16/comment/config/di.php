<?php
/**
 * Configuration file for DI container.
 */
return [

    // Services to add to the container.
    "services" => [
        "commentController" => [
            "shared" => false,
            "callback" => function () {
                $commentController = new \Anax\Comment\CommentController();
                $commentController->setDI($this);
                return $commentController;
            }
        ],
        "userController" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\User\UserController();
                $obj->setDI($this);
                return $obj;
            }
        ],
        "db" => [
            "shared" => true,
            "callback" => function () {
                $obj = new \Anax\Database\DatabaseQueryBuilder();
                $obj->configure("database.php");
                return $obj;
            }
        ],
    ],
];

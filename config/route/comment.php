<?php
 /** Start the session. */
$app->router->add("comment/**", [$app->commentController, "start"]);

/** Post comment */
$app->router->add("comment/post", [$app->commentController, "postComment"]);

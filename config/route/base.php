<?php
/**
 * Basic routes for the site
 */

 /**
  * Test page
  */
 $app->router->add("test", function () use ($app) {
     // Add views to a specific region
     $app->view->add("test/test");

     // Render a standard page using layout
     $app->renderPage([
         "title" => "Test",
     ]);
 });

    $app->router->add("comment", function () use ($app) {
       // Add views to a specific region
        $app->commentController->start();
        $app->view->add("comment/comment", [
         "comments" => $app->commentController->getComments()
        ]);

       // Render a standard page using layout
        $app->renderPage([
            "title" => "Comment",
        ]);
    });

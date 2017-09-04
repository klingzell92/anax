<?php
/**
 * Basic routes for the site
 */

 /**
  * Index page
  */
 $app->router->add("test", function () use ($app) {
     // Add views to a specific region
     $app->view->add("test/test");

     // Render a standard page using layout
     $app->renderPage([
         "title" => "Test",
     ]);
 });


/**
 * Test Page
 */
    $app->router->add("test", function () use ($app) {
    // Add views to a specific region
        $app->view->add("test/test");

    // Render a standard page using layout
        $app->renderPage([
          "title" => "Test",
        ]);
    });

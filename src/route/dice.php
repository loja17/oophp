<?php
/**
 * App specific routes.
 */


/**
 * Dicegame, startpage
 */
$app->router->any(["SESSION", "GET", "POST"], "dice/start", function () use ($app) {

    $data = [
        "title" => "Tärningsspelet 100 - Välj antal tärningar"
    ];

    session_start();

    $_SESSION['computer'] = 0;
    $_SESSION['me'] = 0;
    $_SESSION['roundNr'] = 0;

    //Add view and render page
    $app->view->add("dice/start", $data);
    $app->page->render($data);
});


/**
 * Dicegame, play.
 */
$app->router->any(["SESSION", "GET", "POST"], "dice/play", function () use ($app) {

    $data = [
        "title" => "Tärningsspelet 100"
    ];

    //Add view and render page
    $app->view->add("dice/dice", $data);
    $app->page->render($data);
});

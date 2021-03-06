<?php
/**
 * App specific routes.
 */


/**
 * Guess game (get).
 */
$app->router->get("gissa/get", function () use ($app) {

    $data = [
        "title" => "Gissa mitt nummer med GET"
    ];

    //Get incoming values
    $number = $_GET["number"] ?? -1;
    $tries = $_GET["tries"] ?? 6;
    $guess = $_GET["guess"] ?? null;

    //Start up game
    $game = new Louise\Guess\Guess($number, $tries);

    //Start game
    if (isset($_GET["startGame"])) {
        $game->random();
    }

    //Reset game
    if (isset($_GET["reset"])) {
        $game->random();
    }

    //Do guess
    $res = null;
    if (isset($_GET["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    //Get incoming $data
    $data["game"] = $game;
    $data["res"] = $res;
    $data["guess"] = $guess;

    //Add view and render page
    $app->view->add("guess/get", $data);
    $app->page->render($data);
});



/**
 * Guess game (post).
 */
$app->router->any(["GET", "POST"], "gissa/post", function () use ($app) {

    $data = [
        "title" => "Gissa mitt nummer med POST"
    ];

    //Get incoming values
    $number = $_POST["number"] ?? -1;
    $tries = $_POST["tries"] ?? 6;
    $guess = $_POST["guess"] ?? null;

    //Start up game
    $game = new Louise\Guess\Guess($number, $tries);

    //Start game
    if (isset($_POST["startGame"])) {
        $game->random();
    }

    //Reset game
    if (isset($_POST["reset"])) {
        $game->random();
    }

    //Do guess
    $res = null;
    if (isset($_POST["doGuess"])) {
        $res = $game->makeGuess($guess);
    }

    //Get incoming $data
    $data["game"] = $game;
    $data["res"] = $res;
    $data["guess"] = $guess;

    //Add view and render page
    $app->view->add("guess/post", $data);
    $app->page->render($data);
});



/**
 * Guess game (session).
 */
$app->router->any(["SESSION", "GET", "POST"], "gissa/session", function () use ($app) {

    $data = [
        "title" => "Gissa mitt nummer med SESSION"
    ];

    //SESSION values
    $_SESSION["number"] = $_POST["number"] ?? -1;
    $_SESSION["tries"] = $_POST["tries"] ?? 6;


    //Get incoming guess
    $guess = $_POST["guess"] ?? null;

    if (!isset($_SESSION["game"])) {
        $_SESSION["game"] = new Louise\Guess\Guess($_SESSION["number"], $_SESSION["tries"]);
    }

    //Start game
    if (isset($_POST["startGame"])) {
        $_SESSION["game"]->random();
    }

    //Reset game
    if (isset($_POST["resetGame"])) {
        session_destroy();
        $_SESSION["game"]->destroy();
        $_SESSION["game"]->random();
    }

    //Do guess
    $res = null;
    if (isset($_POST["doGuess"])) {
        $res = $_SESSION["game"]->makeGuess($guess);
    }

    //Get incoming $data
    $data["game"] = $_SESSION["game"];
    $data["res"] = $res;
    $data["guess"] = $guess;

    //Add view and render page
    $app->view->add("guess/session", $data);
    $app->page->render($data);
});

<?php

/**
 * Show off the autoloader.
 */
require "config.php";
require "autoload.php";

session_name("Guess");
session_start();

// Title
$title = "Guess my number (SESSION)";

//SESSION values
$_SESSION["number"] = $_POST["number"] ?? -1;
$_SESSION["tries"] = $_POST["tries"] ?? 6;

//Get incoming guess
$guess = $_POST["guess"] ?? null;

if (!isset($_SESSION["game"])) {
    $_SESSION["game"] = new Guess($_SESSION["number"], $_SESSION["tries"]);
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

require "view/game-session.php";

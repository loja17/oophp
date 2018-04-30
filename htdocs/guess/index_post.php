<?php

/**
 * Show off the autoloader.
 */
require "config.php";
require "autoload.php";

// Title
$title = "Guess my number (POST)";

//Get incoming values
$number = $_POST["number"] ?? -1;
$tries = $_POST["tries"] ?? 6;
$guess = $_POST["guess"] ?? null;


//Start up game
$game = new Guess($number, $tries);

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

require "view/game-post.php";

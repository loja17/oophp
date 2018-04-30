<?php

namespace Louise\Guess;

/**
 * Show off the autoloader.
 */
require __DIR__ . "/config.php";
require __DIR__ . "/../../vendor/autoload.php";

// Title
$title = "Guess my number (GET)";

//Get incoming values

$number = $_GET["number"] ?? -1;
$tries = $_GET["tries"] ?? 6;
$guess = $_GET["guess"] ?? null;

//Start up game
$game = new Guess($number, $tries);

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

//require "view/game-get.php";

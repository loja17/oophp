<?php

namespace Anax\View;

/**
 * Template file to render view for dicegame.
 */


global $diceAmount;
global $currentPlayer;
global $throwStart;
global $roundNr;
  
$diceAmount = $_GET['dices'];
?>

<h1>Tärningsspelet 100 med <?= $diceAmount ?> tärningar</h1>

<p>Börja med att kasta två tärningar, den första är din och den andra är datorns. Den som får högst resultat börjar spela!</p>

<form method="POST">
    <input type="submit" name="throwStart" value="Kasta">
</form>

<br>
<br>

<hr>


<?php
/**
 * Throw  graphic dices.
 */

session_start();

$dice = new \Louise\Dice\DiceGraphic();
$play = new \Louise\Dice\DicePlayer();          

$startRes = [];
$throwRes = [];
$players = [];
$class = [];
$gameover = false;
$temp;

$game = new \Louise\Dice\DiceGame($players);
    
if (!empty($_POST["throwStart"]) && $gameover = true) {
    $game->start($startRes, $class, $dice, $play);
        
    echo "<br>";
    echo "<br>";
} 
    
$currentPlayer = $play->getCurrentPlayer();

if ($currentPlayer == 2) {
    echo "<form method='POST'><input type='submit' name='throwComputer' value='Kasta åt datorn'></form>";
}

if ($currentPlayer == 1) {
    echo "<form method='POST'><input type='submit' name='throwMe' value='Kasta'></form>";
}

if (!empty($_POST['throwComputer']) && $gameover = true) {
    $game->playComputer(2, $diceAmount, $throwRes, $class, $dice, $play);
    $temp = $game->getScore();
    $_SESSION['temp'] += $temp;
}

if (!empty($_POST['throwComputer2']) && $gameover = true) {
    $_SESSION['me'] = $_SESSION['me'] + $_SESSION['temp'];
    $_SESSION['temp'] = 0;
            
    $game->playComputer(2, $diceAmount, $throwRes, $class, $dice, $play);
    $temp = $game->getScore();
    $_SESSION['temp'] += $temp;
}

if (!empty($_POST['throwMe']) && $gameover = true) {
    $game->playMe(1, $diceAmount, $throwRes, $class, $dice, $play);
    $temp = $game->getScore();
    $_SESSION['temp'] += $temp;
}

if (!empty($_POST['throwMe2']) && $gameover = true) {
    $_SESSION['computer'] = $_SESSION['computer'] + $_SESSION['temp'];
    $_SESSION['temp'] = 0;

    $game->playMe(1, $diceAmount, $throwRes, $class, $dice, $play);
    $temp = $game->getScore();
    $_SESSION['temp'] += $temp;
}

if ($_SESSION['temp'] > 0) {
    echo "<p>Rundan ger för närvarande <b>" . $_SESSION['temp'] . "</b> poäng!</p>";
}

echo "<hr>";
echo "<h3>Ställning</h3>";
echo "Du: " . $_SESSION['me'] . "<br>";
echo "Datorn: " . $_SESSION['computer'] . "<br><br>";


if ($_SESSION['computer'] >= 100) {
    $gameover = true;
    echo "<h2>GAME OVER! Datorn vann med " . $_SESSION['computer'] . " poäng!</h2>";
    $_POST = [];
    echo "<form method='get' action='start'><input type='submit' value='Nollställ och spela igen'></form>";
    session_destroy();
}

if ($_SESSION['me'] >= 100) {
    $gameover = true;
    echo "<h2>GRATTIS!!! Du vann med " . $_SESSION['me'] . " poäng!</h2>";
    $_POST = [];
    echo "<form method='get' action='start'><input type='submit' value='Nollställ och spela igen'></form>";
    session_destroy();
}
?>

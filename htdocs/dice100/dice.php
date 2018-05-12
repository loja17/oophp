<?php
/**/
namespace Louise\Dice;

$diceAmount = $_GET["dices"];

?>

<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
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
 * Throw some graphic dices.
 */
include(__DIR__ . "/config.php");
include(__DIR__ . "/autoload_namespace.php");

session_start();

$dice = new DiceGraphic();
$play = new DicePlayer();           

$startRes = [];
$throwRes = [];
$players = [];
$class = [];
$gameover = false;
$temp;

$game = new DiceGame($players);
    
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
    $_SESSION['computer'] += $temp;
    $_SESSION['roundNr'] += 1; 
}

if (!empty($_POST['throwMe']) && $gameover = true) {
    $game->playMe(1, $diceAmount, $throwRes, $class, $dice, $play);
    $temp = $game->getScore();
    $_SESSION['me'] += $temp;
    $_SESSION['roundNr'] += 1;
}

echo "<h3>Ställning</h3>";
echo "Du: " . $_SESSION['me'] . "<br>";
echo "Datorn: " . $_SESSION['computer'] . "<br><br>";
echo "<h4>Runda " . $_SESSION['roundNr'];


if ($_SESSION['computer'] >= 100) {
    $gameover = true;
    echo "<h2>GAME OVER! Datorn vann med " . $_SESSION['computer'] . " poäng!</h2>";
    $_POST = [];
    echo "<form method='get' action='start.php'><input type='submit' value='Nollställ och spela igen'></form>";
    session_destroy();
}

if ($_SESSION['me'] >= 100) {
    $gameover = true;
    echo "<h2>GRATTIS!!! Du vann med " . $_SESSION['me'] . " poäng!</h2>";
    $_POST = [];
    echo "<form method='get' action='start.php'><input type='submit' value='Nollställ och spela igen'></form>";
    session_destroy();
}

?>

<?php
namespace Louise\Dice;

session_start();

$_SESSION['computer'] = 0;
$_SESSION['me'] = 0;
$_SESSION['roundNr'] = 0; 


?>
<!doctype html>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">
<h1>Tärningsspelet 100</h1>

<form method="get" action="dice.php?dices=<?= $_GET["dices"]?>">
    <select name="dices">
        <option value="" disabled selected>Välj antal tärningar att spela med</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
    </select>
    <input type="submit" value="Välj">
</form>
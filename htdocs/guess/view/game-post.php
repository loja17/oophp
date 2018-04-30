<!doctype html>
<meta charset="utf-8"> 

<title><?= $title ?></title>

<body>
<h1><?= $title ?></h1>

<form method="POST">    
    <input type="submit" name="startGame" value="Start">
</form>

<br>

<p>Guess a number between 0-100, you have <?= $game->tries() ?> tries left.</p>

<form method="POST">
    <input type="hidden" name="number" value="<?= $game->number() ?>">
    <input type="hidden" name="tries" value="<?= $game->tries() ?>">
    <input type="text" name="guess" value="<?= $guess ?>" autofocus>
    <input type="submit" name="doGuess" value="Make guess">
    <input type="submit" name="doCheat" value="Cheat">
</form>

<br>

<form method="POST">
    <input type="submit" name="resetGame" value="Reset game">
</form>


<?php if (isset($res)) : ?>
<p>Your guess <?= $guess ?> is <b><?= $res ?></b></p>
<?php endif; ?>

<?php if (isset($_POST["doCheat"])) : ?>
<p>Cheat: <?= $game->number() ?></p>
<?php endif; ?>

</body>
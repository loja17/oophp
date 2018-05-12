<?php

namespace Anax\View;

/**
 * Template file to render start-view for dicegame.
 */

?>
<h1><?= $title ?></h1>

<p>Spelet går ut på att du och datorn kastar tärningar och den som först kommer upp till 100 poäng vinner. Om man får en etta i kastet får man inga poäng för rundan och turen går över till nästa spelare.</p>

<form method="get" action="play">
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
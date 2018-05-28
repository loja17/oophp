<?php
namespace Louise\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
class DiceGame
{
  /**
     * @var integer $players    The playerss.
     * @var integer $points     The points.
     */
    private $players;
    private $points;

    /**
     * Constructor to create a Game.
     *
     * @param null|int    $players The players.
     */
    public function __construct($players)
    {
        $this->players = $players;
    }


    /**
     * Start the game
     *
     * @param $startRes
     * @param $class
     * @param $dice
     * @param $play
     *
     * @var array $startRes   The result sent in
     * @var array $class      For showing graphic dices
     * @var dice $dice        The dice object
     * @var play $play        The play object
     */
    public function start(&$startRes, &$class, $dice, $play)
    {

        for ($i = 0; $i < 2; $i++) {
            $startRes[] = $dice->roll($i, $startRes);
            $class[] = $dice->graphic();
        }
    
        if (!empty($startRes)) {
            echo "<p class='dice-sprite'>";
            foreach ($class as $value) {
                echo "<i class='dice-sprite <?= $value ?>'></i></p>";
            }

            if ("{$startRes[0]}" > "{$startRes[1]}") {
                echo "Du fick högst poäng ( {$startRes[0]} ) och börjar spelet!";
                $this->players[0] = 1;
                $this->players[1] = 2;
                $play->setCurrentPlayer(1);
            } elseif ("{$startRes[0]}" < "{$startRes[1]}") {
                echo "Datorn fick högst poäng ( {$startRes[1]} ) och börjar spelet!";
                $this->players[0] = 2;
                $this->players[1] = 1;
                $play->setCurrentPlayer(2);
            } else {
                echo "Oavgjort! Försök igen.";
            }
        }
    }


    /**
     * Let computer play
     *
     * @param $currentPlayer
     * @param $diceAmount
     * @param $throwRes
     * @param $class
     * @param $dice
     * @param $play
     *
     * @var int $currentPlayer The player
     * @var int $diceAmount    The number of dices
     * @var array $throwRes    The result sent in
     * @var array $class       For showing graphic dices
     * @var dice $dice         The dice object
     * @var play $play         The play object
     */
    public function playComputer($currentPlayer, $diceAmount, &$throwRes, &$class, $dice, $play)
    {
        $this->round = new DiceRound($currentPlayer, $diceAmount);
        for ($i = 0; $i < $diceAmount; $i++) {
            $throwRes[] = $dice->roll($i, $throwRes);
            $class[] = $dice->graphic();
        }
        if (!empty($throwRes)) {
            echo "<p class='dice-sprite'>";
            foreach ($class as $value) {
                echo "<i class='dice-sprite <?= $value ?>'></i></p>";
            }
        }

        if (in_array(1, $throwRes)) {
            $this->points = 0;
            echo "Datorn fick en etta, turen går över till dig!";
            echo "<form method='POST'><input type='submit' name='throwMe' value='Kasta'></form>";
            $_SESSION['temp'] = 0;
        } else {
            $this->points = array_sum($throwRes);
            if (rand(1, 2) == 1) {
                echo "Datorn väljer att fortsätta!";
                echo "<form method='POST'><input type='submit' name='throwComputer' value='Kasta åt datorn'></form>";
            } else {
                echo "Datorn vill inte fortsätta, turen går över till dig.";
                echo "<form method='POST'><input type='submit' name='throwMe2' value='Kasta'></form>";
            }
        }

        echo "Slaget ger datorn $this->points poäng";
    }


    /**
     * Let person play
     *
     * @param $currentPlayer
     * @param $diceAmount
     * @param $throwRes
     * @param $class
     * @param $dice
     * @param $play
     *
     * @var int $currentPlayer The player
     * @var int $diceAmount    The number of dices
     * @var array $throwRes    The result sent in
     * @var array $class       For showing graphic dices
     * @var dice $dice         The dice object
     * @var play $play         The play object
     */
    public function playMe($currentPlayer, $diceAmount, &$throwRes, &$class, $dice, $play)
    {
        $this->round = new DiceRound($currentPlayer, $diceAmount);
        for ($i = 0; $i < $diceAmount; $i++) {
            $throwRes[] = $dice->roll($i, $throwRes);
            $class[] = $dice->graphic();
        }
        if (!empty($throwRes)) {
            echo "<p class='dice-sprite'>";
            foreach ($class as $value) {
                echo "<i class='dice-sprite <?= $value ?>'></i></p>";
            }
        }

        if (in_array(1, $throwRes)) {
            $this->points = 0;
            echo "Du fick en etta och turen går över till datorn...";
            echo "<form method='POST'><input type='submit' name='throwComputer' value='Kasta åt datorn'></form>";
            $_SESSION['temp'] = 0; 
        } else {
            $this->points = array_sum($throwRes);
            echo "Vill du kasta igen?";
            echo "<form method='POST'><input type='submit' name='throwMe' value='Kasta igen!'></form>";
            echo "<form method='POST'><input type='submit' name='throwComputer2' 
                    value='Lämna över turen och kasta åt datorn'></form>";
        }

        echo "Slaget ger dig $this->points poäng";
    }


    /**
     * Check who is starting the game
     *
     * @param $throws
     *
     * @var array $throwRes    The result sent in

     */
    public function setStartPlayer(&$throws)
    {
        if ($throws[0] > $throws[1]) {
            $this->players[0] = 1;
            $this->players[1] = 2;
        } else {
            $this->players[0] = 2;
            $this->players[1] = 1;
        }
    }


    /**
     * Get the value of the startplayer.
     *
     * @return int as the value of the startplayer.
     */
    public function getStartPlayer()
    {
        return $this->players;
    }

    /**
     * Get the scores.
     *
     * @return int as the value of the scores.
     */
    public function getScore()
    {
        return $this->points;
    }
}

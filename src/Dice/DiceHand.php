<?php
namespace Louise\Dice;

/**
 * A dicehand, consisting of dices.
 */
class DiceHand extends Dice
{
    /**
     * @var Dice $dices   Array consisting of dices.
     * @var int  $values  Array consisting of last roll of the dices.
     * @var int  $lastRoll Integer connsisting of the last roll-number.
     */
    private $dices;
    private $values;
    private $lastRoll;

    /**
     * Constructor to initiate the dicehand with a number of dices.
     *
     * @param int $dices Number of dices to create, defaults to five.
     */
    public function __construct(int $dices = 5)
    {
        $this->dices  = [];
        $this->values = [];

        for ($i = 0; $i < $dices; $i++) {
            $this->dices[]  = new Dice(1, 6);
            $this->values[] = null;
        }
    }

    /**
     * Roll all dices save their value.
     *
     * @return void.
     */
    public function roll(int $i, &$array)
    {

        $d = new Dice(1, 6);
        
        $d->setDice();
        $array[$i] = $d->getDice();
        $this->lastRoll = $array[$i];
        $this->values = $array[$i];
    }

    /**
     * Get the last roll.
     *
     * @return int as the sum of the last roll.
     */
    public function getLastRoll()
    {
        return $this->lastRoll;
    }

    /**
     * Get the sum of all dices.
     *
     * @return int as the sum of all dices.
     */
    public function sum()
    {
        $sum = array_sum($this->values);

        return $sum;
    }
}

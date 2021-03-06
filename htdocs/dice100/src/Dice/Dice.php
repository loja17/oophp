<?php
namespace Louise\Dice;

/**
 * Showing off a standard class with methods and properties.
 */
class Dice
{
  /**
     * @var integer $dice   The dices.
     * @var integer $sides  The number of sides on the dice.
     */
    private $dice;
    private $sides;

    /**
     * Constructor to create a Game.
     *
     * @param null|int    $dice The dices.
     * @param null|int    $sides The sides.
     */
    public function __construct(int $dice, int $sides)
    {
        $this->dice = $dice;
        $this->sides = $sides;
    }


    /**
     * Set the random nr of dice.
     *
     * @param int $dice The random nr.
     *
     * @return void
     */
    public function setDice()
    {
        $this->dice = rand(1, 6);
    }

    /**
     * Get the value of the dice.
     *
     * @return int as the value of the dice.
     */
    public function getDice()
    {
        return $this->dice;
    }
}

<?php
namespace PandumWeb\Init\Pokemon;
use PandumWeb\Init\Pokemon\Model\PokemonModel;
/**
 * Class PokemonWater
 * @package PandumWeb\Init\Pokemon
 *
 * @Entity
 */
class PokemonWater extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_WATER);
        $this->attackedAt = new \DateTime('now');
    }
    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_PLANT === $type) ? true : false;
    }
    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_FIRE === $type) ? true : false;
    }
}
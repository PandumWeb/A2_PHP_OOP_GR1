<?php
namespace PandumWeb\Init\Pokemon;
use PandumWeb\Init\Pokemon\Model\PokemonModel;
/**
 * Class PokemonFire
 * @package PandumWeb\Init\Pokemon
 *
 * @Entity
 */
class PokemonFire extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_FIRE);
        $this->attackedAt = new \DateTime('now');
    }
    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_WATER === $type) ? true : false;
    }
    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_PLANT === $type) ? true : false;
    }
}
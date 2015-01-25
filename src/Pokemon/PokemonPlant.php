<?php
namespace PandumWeb\Init\Pokemon;
use PandumWeb\Init\Pokemon\Model\PokemonModel;
/**
 * Class PokemonPlant
 * @package PandumWeb\Init\Pokemon
 *
 * @Entity
 */
class PokemonPlant extends PokemonModel
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setType(self::TYPE_PLANT);
        $this->attackedAt = new \DateTime('now');
    }
    /**
     * @inheritdoc
     */
    public function isTypeWeak($type)
    {
        return (self::TYPE_FIRE === $type) ? true : false;
    }
    /**
     * @inheritdoc
     */
    public function isTypeStrong($type)
    {
        return (self::TYPE_WATER === $type) ? true : false;
    }
}
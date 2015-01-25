<?php
namespace PandumWeb\Init\Pokemon\Model;
use PandumWeb\Init\Trainer;
/**
 * Class PokemonModel
 * @package PandumWeb\Init\Pokemon\Model
 *
 * @Entity
 * @Table(name="pokemons")
 * @InheritanceType("SINGLE_TABLE")
 */
abstract class PokemonModel implements PokemonInterface
{
    /**
     * @var int
     *
     * @Id
     * @GeneratedValue(strategy="AUTO")
     * @Column(name="id", type="integer")
     */
    private $id;
    /**
     * @var string
     *
     * @Column(name="pokemon_name", type="string", length=50, unique=true)
     */
    private $name;
    /**
     * @var int
     *
     * @Column(name="HP", type="integer")
     */
    private $hp;
    /**
     * @var int
     *
     * @OneToOne(targetEntity="PandumWeb\Init\Trainer", cascade={"persist"})
     * @JoinColumn(name="trainer_id", referencedColumnName="id", nullable=false)
     */
    private $trainerId;

    /**
     * @var int
     *
     * @Column(name="type", type="integer")
     */
    private $type;
    const TYPE_FIRE     = 0;
    const TYPE_WATER    = 1;
    const TYPE_PLANT    = 2;
    const TYPE_ELECTRIC = 3;
    const TYPE_PSY      = 4;
    const TYPE_NORMAL   = 5;
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->name;
    }
    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setName($name)
    {
        if (is_string($name))
            $this->name = $name;
        else
            throw new \Exception('Name => string');
        return $this;
    }
    /**
     * @inheritdoc
     */
    public function getHP()
    {
        return $this->hp;
    }
    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = $hp;
        else
            throw new \Exception('HP => int && > 0');
        return $this;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function addHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp += $hp;
        else
            throw new \Exception('HP => int && > 0');
        return $this->hp;
    }
    /**
     * {@inheritdoc}
     *
     * @throws \Exception
     */
    public function removeHP($hp)
    {
        if (is_int($hp) && $hp > 0)
            $this->hp = ($this->hp <= $hp) ? 0 : $this->hp - $hp;
        else
            throw new \Exception('HP => int && > 0');
        return $this->hp;
    }
    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     */
    public function setTrainerId(Trainer $trainerId)
    {
        $this->trainerId = $trainerId;
    }
    /**
     * {@inheritdoc}
     */
    public function getTrainerId()
    {
        return $this->trainerId;
    }
    /**
     * @inheritdoc
     */
    public function getType()
    {
        return $this->type;
    }
    /**
     * {@inheritdoc}
     *
     * @return PokemonModel
     *
     * @throws \Exception
     */
    public function setType($type)
    {
        if (true === in_array($type, [
            self::TYPE_FIRE,
            self::TYPE_WATER,
            self::TYPE_PLANT,
            self::TYPE_ELECTRIC,
            self::TYPE_PSY,
            self::TYPE_NORMAL,
        ]))
            $this->type = $type;
        else
            throw new \Exception('Type => Bad');
        return $this;
    }
    /**
     * @param int $type
     *
     * @return bool
     */
    abstract public function isTypeWeak($type);
    /**
     * @param int $type
     *
     * @return bool
     */
    abstract public function isTypeStrong($type);
    /**
     * @param PokemonModel $target
     *
     * @throws \Exception
     */
    public function attack(PokemonModel $target)
    {
        $attackValue = mt_rand(10, 20);
        if ($this->isTypeStrong($target->getType()))
            $attackValue = ceil($attackValue * 1.5);
        if ($this->isTypeWeak($target->getType()))
            $attackValue = ceil($attackValue / 1.5);
        $target->removeHP((int)$attackValue);
    }
}
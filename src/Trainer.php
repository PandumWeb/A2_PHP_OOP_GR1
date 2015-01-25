<?php

namespace PandumWeb\Init;

/**
 * Class Trainer
 * @package PandumWeb\Init
 *
 * @Entity
 * @Table(name="trainer")
 */
class Trainer
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
     * @Column(name="trainername", type="string", length=50, unique=true)
     */
    private $trainername;
    /**
     * @var string
     *
     * @Column(name="password", type="string", length=25)
     */
    private $password;
    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * {@inheritdoc}
     */
    public function getTrainername()
    {
        return $this->trainername;
    }
    /**
     * {@inheritdoc}
     *
     * @return Trainer
     */
    public function setTrainername($trainername)
    {
        $this->trainername = $trainername;
        return $this;
    }
    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * {@inheritdoc}
     *
     * @return Trainer
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }
}
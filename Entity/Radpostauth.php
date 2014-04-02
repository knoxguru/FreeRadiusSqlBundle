<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Radpostauth
 *
 * @ORM\Table(name="radpostauth")
 * @ORM\Entity
 */
class Radpostauth
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $id;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    public $username = '';

    /**
     * @var string
     *
     * @ORM\Column(name="pass", type="string", length=64, nullable=false)
     */
    public $pass = '';

    /**
     * @var string
     *
     * @ORM\Column(name="reply", type="string", length=32, nullable=false)
     */
    public $reply = '';

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="authdate", type="datetime", nullable=false)
     */
    public $authdate = 'CURRENT_TIMESTAMP';



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Radpostauth
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set pass
     *
     * @param string $pass
     * @return Radpostauth
     */
    public function setPass($pass)
    {
        $this->pass = $pass;

        return $this;
    }

    /**
     * Get pass
     *
     * @return string 
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * Set reply
     *
     * @param string $reply
     * @return Radpostauth
     */
    public function setReply($reply)
    {
        $this->reply = $reply;

        return $this;
    }

    /**
     * Get reply
     *
     * @return string 
     */
    public function getReply()
    {
        return $this->reply;
    }

    /**
     * Set authdate
     *
     * @param \DateTime $authdate
     * @return Radpostauth
     */
    public function setAuthdate($authdate)
    {
        $this->authdate = $authdate;

        return $this;
    }

    /**
     * Get authdate
     *
     * @return \DateTime 
     */
    public function getAuthdate()
    {
        return $this->authdate;
    }
}

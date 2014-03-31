<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Radusergroup
 *
 * @ORM\Table(name="radusergroup", indexes={@ORM\Index(name="username", columns={"username"}), @ORM\Index(name="groupname", columns={"groupname"})})
 * @ORM\Entity
 */
class Radusergroup
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
     * @var integer
     *
     * @ORM\Column(name="priority", type="integer", nullable=false)
     */
    public $priority = '1';

    /**
     * @var \Radgroupcheck
     *
     * @ORM\ManyToOne(targetEntity="Radgroupcheck")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupname", referencedColumnName="groupname")
     * })
     */
    public $groupname;

    /**
     * @var \Radcheck
     *
     * @ORM\ManyToOne(targetEntity="Radcheck")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="username", referencedColumnName="username")
     * })
     */
    public $username;



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
     * Set priority
     *
     * @param integer $priority
     * @return Radusergroup
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer 
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set groupname
     *
     * @param \KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupcheck $groupname
     * @return Radusergroup
     */
    public function setGroupname(\KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupcheck $groupname = null)
    {
        $this->groupname = $groupname;

        return $this;
    }

    /**
     * Get groupname
     *
     * @return \KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupcheck 
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * Set username
     *
     * @param \KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radcheck $username
     * @return Radusergroup
     */
    public function setUsername(\KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radcheck $username = null)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return \KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radcheck 
     */
    public function getUsername()
    {
        return $this->username;
    }
}

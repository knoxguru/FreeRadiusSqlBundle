<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Radgroupreply
 *
 * @ORM\Table(name="radgroupreply", indexes={@ORM\Index(name="groupname", columns={"groupname"})})
 * @ORM\Entity
 */
class Radgroupreply
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="attribute", type="string", length=64, nullable=false)
     */
    protected $attribute = '';

    /**
     * @var string
     *
     * @ORM\Column(name="op", type="string", length=2, nullable=false)
     */
    protected $op = '=';

    /**
     * @var string
     *
     * @ORM\Column(name="value", type="string", length=253, nullable=false)
     */
    protected $value = '';

    /**
     * @var \Radgroupcheck
     *
     * @ORM\ManyToOne(targetEntity="Radgroupcheck")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="groupname", referencedColumnName="groupname")
     * })
     */
    protected $groupname;



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
     * Set attribute
     *
     * @param string $attribute
     * @return Radgroupreply
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get attribute
     *
     * @return string 
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set op
     *
     * @param string $op
     * @return Radgroupreply
     */
    public function setOp($op)
    {
        $this->op = $op;

        return $this;
    }

    /**
     * Get op
     *
     * @return string 
     */
    public function getOp()
    {
        return $this->op;
    }

    /**
     * Set value
     *
     * @param string $value
     * @return Radgroupreply
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get value
     *
     * @return string 
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set groupname
     *
     * @param \KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity\Radgroupcheck $groupname
     * @return Radgroupreply
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

    public function __toString() {
	return (string) $this->groupname;
    }
}

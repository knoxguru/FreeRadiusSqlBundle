<?php

namespace KnoxGuru\Bundle\FreeRadiusSqlBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Radacct
 *
 * @ORM\Table(name="radacct", uniqueConstraints={@ORM\UniqueConstraint(name="acctuniqueid", columns={"acctuniqueid"})}, indexes={@ORM\Index(name="username", columns={"username"}), @ORM\Index(name="framedipaddress", columns={"framedipaddress"}), @ORM\Index(name="acctsessionid", columns={"acctsessionid"}), @ORM\Index(name="acctsessiontime", columns={"acctsessiontime"}), @ORM\Index(name="acctstarttime", columns={"acctstarttime"}), @ORM\Index(name="acctstoptime", columns={"acctstoptime"}), @ORM\Index(name="nasipaddress", columns={"nasipaddress"})})
 * @ORM\Entity
 */
class Radacct
{
    /**
     * @var integer
     *
     * @ORM\Column(name="radacctid", type="bigint", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    public $radacctid;

    /**
     * @var string
     *
     * @ORM\Column(name="acctsessionid", type="string", length=64, nullable=false)
     */
    public $acctsessionid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="acctuniqueid", type="string", length=32, nullable=false)
     */
    public $acctuniqueid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=64, nullable=false)
     */
    public $username = '';

    /**
     * @var string
     *
     * @ORM\Column(name="groupname", type="string", length=64, nullable=false)
     */
    public $groupname = '';

    /**
     * @var string
     *
     * @ORM\Column(name="realm", type="string", length=64, nullable=true)
     */
    public $realm = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nasipaddress", type="string", length=15, nullable=false)
     */
    public $nasipaddress = '';

    /**
     * @var string
     *
     * @ORM\Column(name="nasportid", type="string", length=15, nullable=true)
     */
    public $nasportid;

    /**
     * @var string
     *
     * @ORM\Column(name="nasporttype", type="string", length=32, nullable=true)
     */
    public $nasporttype;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="acctstarttime", type="datetime", nullable=true)
     */
    public $acctstarttime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="acctstoptime", type="datetime", nullable=true)
     */
    public $acctstoptime;

    /**
     * @var integer
     *
     * @ORM\Column(name="acctsessiontime", type="integer", nullable=true)
     */
    public $acctsessiontime;

    /**
     * @var string
     *
     * @ORM\Column(name="acctauthentic", type="string", length=32, nullable=true)
     */
    public $acctauthentic;

    /**
     * @var string
     *
     * @ORM\Column(name="connectinfo_start", type="string", length=50, nullable=true)
     */
    public $connectinfoStart;

    /**
     * @var string
     *
     * @ORM\Column(name="connectinfo_stop", type="string", length=50, nullable=true)
     */
    public $connectinfoStop;

    /**
     * @var integer
     *
     * @ORM\Column(name="acctinputoctets", type="bigint", nullable=true)
     */
    public $acctinputoctets;

    /**
     * @var integer
     *
     * @ORM\Column(name="acctoutputoctets", type="bigint", nullable=true)
     */
    public $acctoutputoctets;

    /**
     * @var string
     *
     * @ORM\Column(name="calledstationid", type="string", length=50, nullable=false)
     */
    public $calledstationid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="callingstationid", type="string", length=50, nullable=false)
     */
    public $callingstationid = '';

    /**
     * @var string
     *
     * @ORM\Column(name="acctterminatecause", type="string", length=32, nullable=false)
     */
    public $acctterminatecause = '';

    /**
     * @var string
     *
     * @ORM\Column(name="servicetype", type="string", length=32, nullable=true)
     */
    public $servicetype;

    /**
     * @var string
     *
     * @ORM\Column(name="framedprotocol", type="string", length=32, nullable=true)
     */
    public $framedprotocol;

    /**
     * @var string
     *
     * @ORM\Column(name="framedipaddress", type="string", length=15, nullable=false)
     */
    public $framedipaddress = '';

    /**
     * @var integer
     *
     * @ORM\Column(name="acctstartdelay", type="integer", nullable=true)
     */
    public $acctstartdelay;

    /**
     * @var integer
     *
     * @ORM\Column(name="acctstopdelay", type="integer", nullable=true)
     */
    public $acctstopdelay;

    /**
     * @var string
     *
     * @ORM\Column(name="xascendsessionsvrkey", type="string", length=10, nullable=true)
     */
    public $xascendsessionsvrkey;



    /**
     * Get radacctid
     *
     * @return integer 
     */
    public function getRadacctid()
    {
        return $this->radacctid;
    }

    /**
     * Set acctsessionid
     *
     * @param string $acctsessionid
     * @return Radacct
     */
    public function setAcctsessionid($acctsessionid)
    {
        $this->acctsessionid = $acctsessionid;

        return $this;
    }

    /**
     * Get acctsessionid
     *
     * @return string 
     */
    public function getAcctsessionid()
    {
        return $this->acctsessionid;
    }

    /**
     * Set acctuniqueid
     *
     * @param string $acctuniqueid
     * @return Radacct
     */
    public function setAcctuniqueid($acctuniqueid)
    {
        $this->acctuniqueid = $acctuniqueid;

        return $this;
    }

    /**
     * Get acctuniqueid
     *
     * @return string 
     */
    public function getAcctuniqueid()
    {
        return $this->acctuniqueid;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return Radacct
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
     * Set groupname
     *
     * @param string $groupname
     * @return Radacct
     */
    public function setGroupname($groupname)
    {
        $this->groupname = $groupname;

        return $this;
    }

    /**
     * Get groupname
     *
     * @return string 
     */
    public function getGroupname()
    {
        return $this->groupname;
    }

    /**
     * Set realm
     *
     * @param string $realm
     * @return Radacct
     */
    public function setRealm($realm)
    {
        $this->realm = $realm;

        return $this;
    }

    /**
     * Get realm
     *
     * @return string 
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * Set nasipaddress
     *
     * @param string $nasipaddress
     * @return Radacct
     */
    public function setNasipaddress($nasipaddress)
    {
        $this->nasipaddress = $nasipaddress;

        return $this;
    }

    /**
     * Get nasipaddress
     *
     * @return string 
     */
    public function getNasipaddress()
    {
        return $this->nasipaddress;
    }

    /**
     * Set nasportid
     *
     * @param string $nasportid
     * @return Radacct
     */
    public function setNasportid($nasportid)
    {
        $this->nasportid = $nasportid;

        return $this;
    }

    /**
     * Get nasportid
     *
     * @return string 
     */
    public function getNasportid()
    {
        return $this->nasportid;
    }

    /**
     * Set nasporttype
     *
     * @param string $nasporttype
     * @return Radacct
     */
    public function setNasporttype($nasporttype)
    {
        $this->nasporttype = $nasporttype;

        return $this;
    }

    /**
     * Get nasporttype
     *
     * @return string 
     */
    public function getNasporttype()
    {
        return $this->nasporttype;
    }

    /**
     * Set acctstarttime
     *
     * @param \DateTime $acctstarttime
     * @return Radacct
     */
    public function setAcctstarttime($acctstarttime)
    {
        $this->acctstarttime = $acctstarttime;

        return $this;
    }

    /**
     * Get acctstarttime
     *
     * @return \DateTime 
     */
    public function getAcctstarttime()
    {
        return $this->acctstarttime;
    }

    /**
     * Set acctstoptime
     *
     * @param \DateTime $acctstoptime
     * @return Radacct
     */
    public function setAcctstoptime($acctstoptime)
    {
        $this->acctstoptime = $acctstoptime;

        return $this;
    }

    /**
     * Get acctstoptime
     *
     * @return \DateTime 
     */
    public function getAcctstoptime()
    {
        return $this->acctstoptime;
    }

    /**
     * Set acctsessiontime
     *
     * @param integer $acctsessiontime
     * @return Radacct
     */
    public function setAcctsessiontime($acctsessiontime)
    {
        $this->acctsessiontime = $acctsessiontime;

        return $this;
    }

    /**
     * Get acctsessiontime
     *
     * @return integer 
     */
    public function getAcctsessiontime()
    {
        return $this->acctsessiontime;
    }

    /**
     * Set acctauthentic
     *
     * @param string $acctauthentic
     * @return Radacct
     */
    public function setAcctauthentic($acctauthentic)
    {
        $this->acctauthentic = $acctauthentic;

        return $this;
    }

    /**
     * Get acctauthentic
     *
     * @return string 
     */
    public function getAcctauthentic()
    {
        return $this->acctauthentic;
    }

    /**
     * Set connectinfoStart
     *
     * @param string $connectinfoStart
     * @return Radacct
     */
    public function setConnectinfoStart($connectinfoStart)
    {
        $this->connectinfoStart = $connectinfoStart;

        return $this;
    }

    /**
     * Get connectinfoStart
     *
     * @return string 
     */
    public function getConnectinfoStart()
    {
        return $this->connectinfoStart;
    }

    /**
     * Set connectinfoStop
     *
     * @param string $connectinfoStop
     * @return Radacct
     */
    public function setConnectinfoStop($connectinfoStop)
    {
        $this->connectinfoStop = $connectinfoStop;

        return $this;
    }

    /**
     * Get connectinfoStop
     *
     * @return string 
     */
    public function getConnectinfoStop()
    {
        return $this->connectinfoStop;
    }

    /**
     * Set acctinputoctets
     *
     * @param integer $acctinputoctets
     * @return Radacct
     */
    public function setAcctinputoctets($acctinputoctets)
    {
        $this->acctinputoctets = $acctinputoctets;

        return $this;
    }

    /**
     * Get acctinputoctets
     *
     * @return integer 
     */
    public function getAcctinputoctets()
    {
        return $this->acctinputoctets;
    }

    /**
     * Set acctoutputoctets
     *
     * @param integer $acctoutputoctets
     * @return Radacct
     */
    public function setAcctoutputoctets($acctoutputoctets)
    {
        $this->acctoutputoctets = $acctoutputoctets;

        return $this;
    }

    /**
     * Get acctoutputoctets
     *
     * @return integer 
     */
    public function getAcctoutputoctets()
    {
        return $this->acctoutputoctets;
    }

    /**
     * Set calledstationid
     *
     * @param string $calledstationid
     * @return Radacct
     */
    public function setCalledstationid($calledstationid)
    {
        $this->calledstationid = $calledstationid;

        return $this;
    }

    /**
     * Get calledstationid
     *
     * @return string 
     */
    public function getCalledstationid()
    {
        return $this->calledstationid;
    }

    /**
     * Set callingstationid
     *
     * @param string $callingstationid
     * @return Radacct
     */
    public function setCallingstationid($callingstationid)
    {
        $this->callingstationid = $callingstationid;

        return $this;
    }

    /**
     * Get callingstationid
     *
     * @return string 
     */
    public function getCallingstationid()
    {
        return $this->callingstationid;
    }

    /**
     * Set acctterminatecause
     *
     * @param string $acctterminatecause
     * @return Radacct
     */
    public function setAcctterminatecause($acctterminatecause)
    {
        $this->acctterminatecause = $acctterminatecause;

        return $this;
    }

    /**
     * Get acctterminatecause
     *
     * @return string 
     */
    public function getAcctterminatecause()
    {
        return $this->acctterminatecause;
    }

    /**
     * Set servicetype
     *
     * @param string $servicetype
     * @return Radacct
     */
    public function setServicetype($servicetype)
    {
        $this->servicetype = $servicetype;

        return $this;
    }

    /**
     * Get servicetype
     *
     * @return string 
     */
    public function getServicetype()
    {
        return $this->servicetype;
    }

    /**
     * Set framedprotocol
     *
     * @param string $framedprotocol
     * @return Radacct
     */
    public function setFramedprotocol($framedprotocol)
    {
        $this->framedprotocol = $framedprotocol;

        return $this;
    }

    /**
     * Get framedprotocol
     *
     * @return string 
     */
    public function getFramedprotocol()
    {
        return $this->framedprotocol;
    }

    /**
     * Set framedipaddress
     *
     * @param string $framedipaddress
     * @return Radacct
     */
    public function setFramedipaddress($framedipaddress)
    {
        $this->framedipaddress = $framedipaddress;

        return $this;
    }

    /**
     * Get framedipaddress
     *
     * @return string 
     */
    public function getFramedipaddress()
    {
        return $this->framedipaddress;
    }

    /**
     * Set acctstartdelay
     *
     * @param integer $acctstartdelay
     * @return Radacct
     */
    public function setAcctstartdelay($acctstartdelay)
    {
        $this->acctstartdelay = $acctstartdelay;

        return $this;
    }

    /**
     * Get acctstartdelay
     *
     * @return integer 
     */
    public function getAcctstartdelay()
    {
        return $this->acctstartdelay;
    }

    /**
     * Set acctstopdelay
     *
     * @param integer $acctstopdelay
     * @return Radacct
     */
    public function setAcctstopdelay($acctstopdelay)
    {
        $this->acctstopdelay = $acctstopdelay;

        return $this;
    }

    /**
     * Get acctstopdelay
     *
     * @return integer 
     */
    public function getAcctstopdelay()
    {
        return $this->acctstopdelay;
    }

    /**
     * Set xascendsessionsvrkey
     *
     * @param string $xascendsessionsvrkey
     * @return Radacct
     */
    public function setXascendsessionsvrkey($xascendsessionsvrkey)
    {
        $this->xascendsessionsvrkey = $xascendsessionsvrkey;

        return $this;
    }

    /**
     * Get xascendsessionsvrkey
     *
     * @return string 
     */
    public function getXascendsessionsvrkey()
    {
        return $this->xascendsessionsvrkey;
    }
}

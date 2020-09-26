<?php

namespace ClientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="ClientBundle\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $name;

     /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $prenom;

     /**
     * @var date
     * @ORM\Column(type="date")
     */
    private $dateNai;


     /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $sexe;

     /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $telephone;

     /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $pays;

     /**
     * @var date
     * @ORM\Column(type="date")
     */
    private $dateinsc;

     /**
     * @var string
     * @ORM\Column(type="string", length=100)
     */
    private $etat;

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return Client
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return Client
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set dateNai
     *
     * @param \DateTime $dateNai
     *
     * @return Client
     */
    public function setDateNai($dateNai)
    {
        $this->dateNai = $dateNai;

        return $this;
    }

    /**
     * Get dateNai
     *
     * @return \DateTime
     */
    public function getDateNai()
    {
        return $this->dateNai;
    }

    /**
     * Set sexe
     *
     * @param string $sexe
     *
     * @return Client
     */
    public function setSexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }

    /**
     * Get sexe
     *
     * @return string
     */
    public function getSexe()
    {
        return $this->sexe;
    }

    /**
     * Set telephone
     *
     * @param string $telephone
     *
     * @return Client
     */
    public function setTelephone($telephone)
    {
        $this->telephone = $telephone;

        return $this;
    }

    /**
     * Get telephone
     *
     * @return string
     */
    public function getTelephone()
    {
        return $this->telephone;
    }

    /**
     * Set pays
     *
     * @param string $pays
     *
     * @return Client
     */
    public function setPays($pays)
    {
        $this->pays = $pays;

        return $this;
    }

    /**
     * Get pays
     *
     * @return string
     */
    public function getPays()
    {
        return $this->pays;
    }

    /**
     * Set dateinsc
     *
     * @param \DateTime $dateinsc
     *
     * @return Client
     */
    public function setDateinsc($dateinsc)
    {
        $this->dateinsc = $dateinsc;

        return $this;
    }

    /**
     * Get dateinsc
     *
     * @return \DateTime
     */
    public function getDateinsc()
    {
        return $this->dateinsc;
    }

    /**
     * Set etat
     *
     * @param string $etat
     *
     * @return Client
     */
    public function setEtat($etat)
    {
        $this->etat = $etat;

        return $this;
    }

    /**
     * Get etat
     *
     * @return string
     */
    public function getEtat()
    {
        return $this->etat;
    }
}

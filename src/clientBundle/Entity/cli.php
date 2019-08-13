<?php

namespace clientBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * cli
 *
 * @ORM\Table(name="cli")
 * @ORM\Entity(repositoryClass="clientBundle\Repository\cliRepository")
 */
class cli
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
     * lorsqu'on supprime un client on ne supprime pas ses ventes
     * 
     * @ORM\OneToMany(targetEntity="ventesBundle\Entity\vent",
     *                  mappedBy="client",
     *                  cascade={"persist"})
     *
     * @ORM\JoinColumn(nullable=true)
     */     
    private $ventes;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nom_client", type="string", length=25)
     */
    private $nomClient;

    /**
     * @var string
     *
     * @ORM\Column(name="email_client", type="string", length=50, unique=true)
     */
    private $emailClient;

    /**
     * @var int
     *
     * @ORM\Column(name="tel_client", type="integer", unique=true)
     */
    private $telClient;

    /**
     * @var string
     *
     * @ORM\Column(name="adresse_client", type="string", unique=true)
     */
    private $adresseClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_ajout_client", type="datetime")
     */
    private $dateAjoutClient;

    /**
     * @var string
     *
     * @ORM\Column(name="ajoute_par_client", type="string", length=25)
     */
    private $ajouteParClient;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_mise_ajour_client", type="datetime")
     */
    private $dateMiseAjourClient;

    /**
     * @var string
     *
     * @ORM\Column(name="mis_ajour_par_client", type="string", length=25)
     */
    private $misAjourParClient;


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
     * Set nomClient
     *
     * @param string $nomClient
     *
     * @return cli
     */
    public function setNomClient($nomClient)
    {
        $this->nomClient = $nomClient;

        return $this;
    }

    /**
     * Get nomClient
     *
     * @return string
     */
    public function getNomClient()
    {
        return $this->nomClient;
    }

    /**
     * Set emailClient
     *
     * @param string $emailClient
     *
     * @return cli
     */
    public function setEmailClient($emailClient)
    {
        $this->emailClient = $emailClient;

        return $this;
    }

    /**
     * Get emailClient
     *
     * @return string
     */
    public function getEmailClient()
    {
        return $this->emailClient;
    }

    /**
     * Set telClient
     *
     * @param integer $telClient
     *
     * @return cli
     */
    public function setTelClient($telClient)
    {
        $this->telClient = $telClient;

        return $this;
    }

    /**
     * Get telClient
     *
     * @return int
     */
    public function getTelClient()
    {
        return $this->telClient;
    }

    /**
     * Set adresseClient
     *
     * @param string $adresseClient
     *
     * @return cli
     */
    public function setAdresseClient($adresseClient)
    {
        $this->adresseClient = $adresseClient;

        return $this;
    }

    /**
     * Get adresseClient
     *
     * @return string
     */
    public function getAdresseClient()
    {
        return $this->adresseClient;
    }

    /**
     * Set dateAjoutClient
     *
     * @param \DateTime $dateAjoutClient
     *
     * @return cli
     */
    public function setDateAjoutClient($dateAjoutClient)
    {
        $this->dateAjoutClient = $dateAjoutClient;

        return $this;
    }

    /**
     * Get dateAjoutClient
     *
     * @return \DateTime
     */
    public function getDateAjoutClient()
    {
        return $this->dateAjoutClient;
    }

    /**
     * Set ajouteParClient
     *
     * @param string $ajouteParClient
     *
     * @return cli
     */
    public function setAjouteParClient($ajouteParClient)
    {
        $this->ajouteParClient = $ajouteParClient;

        return $this;
    }

    /**
     * Get ajouteParClient
     *
     * @return string
     */
    public function getAjouteParClient()
    {
        return $this->ajouteParClient;
    }

    /**
     * Set dateMiseAjourClient
     *
     * @param \DateTime $dateMiseAjourClient
     *
     * @return cli
     */
    public function setDateMiseAjourClient($dateMiseAjourClient)
    {
        $this->dateMiseAjourClient = $dateMiseAjourClient;

        return $this;
    }

    /**
     * Get dateMiseAjourClient
     *
     * @return \DateTime
     */
    public function getDateMiseAjourClient()
    {
        return $this->dateMiseAjourClient;
    }

    /**
     * Set misAjourParClient
     *
     * @param string $misAjourParClient
     *
     * @return cli
     */
    public function setMisAjourParClient($misAjourParClient)
    {
        $this->misAjourParClient = $misAjourParClient;

        return $this;
    }

    /**
     * Get misAjourParClient
     *
     * @return string
     */
    public function getMisAjourParClient()
    {
        return $this->misAjourParClient;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ventes = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add vente
     *
     * @param \ventesBundle\Entity\vent $vente
     *
     * @return cli
     */
    public function addVente(\ventesBundle\Entity\vent $vente)
    {
        $this->ventes[] = $vente;

        return $this;
    }

    /**
     * Remove vente
     *
     * @param \ventesBundle\Entity\vent $vente
     */
    public function removeVente(\ventesBundle\Entity\vent $vente)
    {
        $this->ventes->removeElement($vente);
    }

    /**
     * Get ventes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getVentes()
    {
        return $this->ventes;
    }
}
